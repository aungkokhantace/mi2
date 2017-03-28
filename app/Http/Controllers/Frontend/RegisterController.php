<?php
namespace App\Http\Controllers\Frontend;

use App\Backend\MedicalSpeciality\MedicalSpecialityRepository;
use App\Backend\Page\PageRepository;
use App\Backend\Post\PostRepository;
use App\Backend\Register\AppRegister;
use App\Backend\Permission\Permission;
use App\Backend\RegistrationCategory\RegistrationCategory;
use App\Backend\RegistrationCategory\RegistrationCategoryRepository;
use App\Backend\TemplateSlider\TemplateSliderRepository;
use App\Backend\TemplateSliderDetail\TemplateSliderDetailRepository;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Backend\Register\RegisterRepositoryInterface;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Backend\Register\Register;
use Carbon\Carbon;
use App\Backend\Register\RegisterRepository;
use App\Backend\Infrastructure\Forms\RegisterEntryRequest;
use App\Backend\Infrastructure\Forms\EventEditRequest;
use App\Core\Utility;
use Illuminate\Support\Facades\Route;
use Mail;

class RegisterController extends Controller
{   

    public function __construct()
    {        
    }

    public function call()
    {
        $countries = Utility::getSettingsByType("COUNTRY");

        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);
        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.register.register_call')->with('countries', $countries)->with('page', $page)->with('posts', $posts)->with('images', $images)->with('$status', $status);
    }

     public function create(){
         $countries = Utility::getSettingsByType("COUNTRY");

         $medicalspecialityRepo = new MedicalSpecialityRepository();
         $medicalspecialities   = $medicalspecialityRepo->getObjs();

         $specialitiesArr = array();
         foreach($medicalspecialities as $k=>$medicalspeciality){
//             if(isset($medicalspeciality->option_group_name) && $medicalspeciality->option_group_name == null){
             if($medicalspeciality->option_group_name == null){
                 $specialitiesArr["main_speciality"][$k] = $medicalspeciality;
             }
             elseif(isset($medicalspeciality->option_group_name) && $medicalspeciality->option_group_name != null){
                 $specialitiesArr[$medicalspeciality->option_group_name][$k] = $medicalspeciality;
             }
         }

//         $url = Route::getCurrentRoute()->getPath();
//         $pageRepo = new PageRepository();
//         $page_id  = $pageRepo->getPageIDByURL($url);
//         $page = $pageRepo->getObjByID($page_id);

         $registrationCategoryRepo = new RegistrationCategoryRepository();
         $registrationCategories   = $registrationCategoryRepo->getObjs();

         //for slider view
         $url = Route::getCurrentRoute()->getPath();

         $pageRepo = new PageRepository();
         $page_id  = $pageRepo->getPageIDByURL($url);
         $page = $pageRepo->getObjByID($page_id);
         //get template of page
         $template_id = $page->templates_id;

         //get slider of template
         $templateSliderRepo = new TemplateSliderRepository();
         $slider = $templateSliderRepo->getObjByTemplateID($template_id);

         //get images of the slider
         $sliderdetailRepo = new TemplateSliderDetailRepository();
         $images      = $sliderdetailRepo->getObjsById($slider->id);
         $status = "active";
         //for slider view

        return view('frontend.register.register_frontend')->with('countries', $countries)->with('specialitiesArr', $specialitiesArr)->with('registrationCategories', $registrationCategories)->with('images', $images)->with('$status', $status);
    }


    public function store(RegisterEntryRequest $request)
        {
            $registerRepo = new RegisterRepository();
            $request->validate();
            $first_name           = Input::get('first_name');
            $middle_name          = Input::get('middle_name');
            $last_name            = Input::get('last_name');
            $title                = Input::get('title');
            $email                = Input::get('email');
            $country              = Input::get('country');  
//            $where_work           = Input::get('where_work');
            $medical_specialities = Input::get('medical_specialities');
            if($medical_specialities == "other"){
                $medical_specialities = 0;
                $other_specialities  = Input::get('other');
            }
            else{
                $other_specialities  = null;
            }

            $phone_no             = Input::get('phone_no');
            $registration_category= Input::get('registration_category');
            $payment_type         = Input::get('payment_type');
            $registered_date      = date("Y-m-d");

            $register = new register();
            $register->first_name = $first_name;
            $register->middle_name = $middle_name;
            $register->last_name = $last_name;
            $register->title = $title;
            $register->email = $email;
            $register->country = $country;
//            $register->where_work = $where_work;
            $register->medical_speciality_id = $medical_specialities;
            $register->medical_speciality_other = $other_specialities;
            $register->phone_no = $phone_no;
            $register->registration_category = $registration_category;
            $register->payment_type = $payment_type;
            $register->status = "pending";
            $register->registered_date = $registered_date;

            $result = $registerRepo->create($register);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            //start sending email to user
            $userEmailArr = array();
            $userEmailArr[0] = $email;
            $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'REG_SUBMIT_USER' LIMIT 1");

            $userContent = "<p>Dear ".$first_name.",<p>";
            if(isset($userContentRaw) && count($userContentRaw)>0){
                $userContent .= $userContentRaw[0]->description;
            }
            else{
                $userContent .= "Registration Submission Reply...";
            }

            if(isset($userEmailArr) && count($userEmailArr)>0){
                Mail::send([], [], function($message) use($userEmailArr,$userContent) {
                    $message->to($userEmailArr)->subject('Registration Submission Reply')->setBody($userContent, 'text/html');;
//                    Attach file
//                    $message->attach($attach);
                });
            }
            //end sending email to user

            //start sending email to admin
//            $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL");
            $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 2"); //type = 2 is for register
            $adminEmailArr = array();
            foreach($adminEmailRaw as $eRaw){
                array_push($adminEmailArr,$eRaw->email);
            }

            $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'REG_SUBMIT_ADMIN' LIMIT 1");

            $adminContent = "<p>Dear Sir,<p>";
            if(isset($adminContentRaw) && count($adminContentRaw)>0){
                $adminContent .= $adminContentRaw[0]->description;
            }
            else{
                $adminContent .= "Registration Submission Reply...";
            }

            if(isset($adminEmailArr) && count($adminEmailArr)>0){
                Mail::send([], [], function($message) use($adminEmailArr,$adminContent) {
                    $message->to($adminEmailArr)->subject('Registration Submission Reply')->setBody($adminContent, 'text/html');;
//                    Attach file
//                    $message->attach($attach);
                });
            }
            //end sending email to admin

//            alert()->success('Registration successfully created. ')->persistent('OK');
            alert()->success('Registration successfully submitted. Please check your email for further information.')->persistent('OK');
            return redirect()->action('Frontend\RegisterController@create');
        }
        else{
            return redirect()->action('Frontend\RegisterController@create')
                ->withMessage(FormatGenerator::message('Fail', 'Registration did not create ...'));
        }
    }

   

}