<?php
namespace App\Http\Controllers\Frontend;

use App\Backend\MedicalSpeciality\MedicalSpecialityRepository;
use App\Backend\Page\PageRepository;
use App\Backend\Post\PostRepository;
use App\Backend\Register\AppRegister;
use App\Backend\Permission\Permission;
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
use App\Backend\Register\register;
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

        return view('frontend.register.register_call')->with('countries', $countries)->with('page', $page)->with('posts', $posts);
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
        return view('frontend.register.register_frontend')->with('countries', $countries)->with('specialitiesArr', $specialitiesArr);
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
            $emailArr = array();
            $emailArr[0] = $email;
            $contentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'TO_EMAIL_REGISTRATION' LIMIT 1");

            if(isset($contentRaw) && count($contentRaw)>0){
                $content = $contentRaw[0]->description;
            }
            else{
                $content = "Registration Reply...";
            }

            if(isset($emailArr) && count($emailArr)>0){
                Mail::send([], [], function($message) use($emailArr,$content) {
                    $message->to($emailArr)->subject('Registration Reply')->setBody($content, 'text/html');;
//                    Attach file
//                    $message->attach($attach);

                });
            }
            alert()->success('Registration successfully created. ')->persistent('OK');
            return redirect()->action('Frontend\RegisterController@create');
        }
        else{
            return redirect()->action('Frontend\RegisterController@create')
                ->withMessage(FormatGenerator::message('Fail', 'Registration did not create ...'));
        }
    }

   

}