<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 10:55 AM
 */

namespace App\Http\Controllers\Frontend;

use App\Backend\File\FileUploadDownloadRepository;
use App\Backend\MedicalSpeciality\MedicalSpecialityRepository;
use App\Backend\Page\PageRepository;
use App\Backend\Post\PostRepository;
use App\Backend\TemplateSlider\TemplateSliderRepository;
use App\Backend\TemplateSliderDetail\TemplateSliderDetailRepository;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Backend\Abstractform\AbstractformRepositoryInterface;
use App\Backend\Abstractform\Abstractform;
use App\Backend\File\FileUploadDownloadRepositoryInterface;
use App\Backend\File\FileUploadDownload;
use App\Backend\Infrastructure\Forms\AbstractformEntryRequest;
use App\Backend\Infrastructure\Forms\AbstractformEditRequest;
use App\Core\Permission\PermissionRepositoryInterface;
use App\Core\Permission\Permission;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Core\Utility;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class AbstractformController extends Controller
{

    private $abstractformRepository;

    public function __construct(AbstractformRepositoryInterface $abstractformRepository)
    {
        $this->abstractformRepository = $abstractformRepository;
    }

    public function create(Request $request)
    {
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

        return view('frontend.abstractform.abstractform')->with('countries', $countries)->with('specialitiesArr', $specialitiesArr)->with('images', $images)->with('$status', $status);
    }

    public function store(AbstractformEntryRequest $request)
    {
        $request->validate();

        $filetable = (new FileUploadDownload())->getTable();
        $abstracttable = (new Abstractform())->getTable();
        $abstract_file_path     = Input::file('abstract_file_path');

      //start file section
        $extension = $abstract_file_path->getClientOriginalExtension();

        // SET UPLOAD PATH
//        $destinationPath = 'uploads';
        $destinationPath = base_path().'/public/uploads';
        // GET THE FILE EXTENSION
        $extension = $abstract_file_path->getClientOriginalExtension();

        // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = $abstract_file_path->getFilename() . '.' . $extension;

        if ( ! file_exists($destinationPath))
        {
            mkdir($destinationPath, 0777, true);
        }

        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $abstract_file_path->move($destinationPath, $fileName);

        $paramObj = new FileUploadDownload();
        $paramObj->mime = $abstract_file_path->getClientMimeType();
        $paramObj->original_filename = $abstract_file_path->getClientOriginalName();
        $paramObj->filename = $abstract_file_path->getFilename().'.'.$extension;

        $filerepo = new FileUploadDownloadRepository();
        $result = $filerepo->create($paramObj);
        //end file section

        $first_name             = Input::get('first_name');

        $middle_name            = Input::get('middle_name');
        $last_name              = Input::get('last_name');
        $title                  = Input::get('title');
        $email                  = Input::get('email');
        $country                = Input::get('country');
        $abstract_title         = Input::get('abstract_title');
        $medical_specialities   = Input::get('medical_specialities');
        if($medical_specialities == "other"){
            $medical_specialities = 0;
            $other_specialities  = Input::get('other');
        }
        else{
            $other_specialities  = null;
        }

        $registered_date        = date("Y-m-d");

        $abstractform = new Abstractform();
        $abstractform->first_name            = $first_name;
        $abstractform->middle_name           = $middle_name;
        $abstractform->last_name             = $last_name;
        $abstractform->title                 = $title;
        $abstractform->email                 = $email;
        $abstractform->country               = $country;
        $abstractform->abstract_title        = $abstract_title;
//        $abstractform->medical_specialities  = $medical_specialities;
        $abstractform->medical_speciality_id = $medical_specialities;
        $abstractform->medical_speciality_other = $other_specialities;
        $abstractform->abstract_file_path    =  "uploads/".$abstract_file_path->getFilename() . '.' . $extension;
        $abstractform->status                = "pending";
        $abstractform->registered            = "0";
        $abstractform->events_id             = 1;
        $abstractform->registered_date       = $registered_date;

        $result = $this->abstractformRepository->create($abstractform);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            //start sending email to user
            $userEmailArr = array();
            $userEmailArr[0] = $email;

            //start getting super-admin email and adding to email array
            $superadminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 3"); //type = 3 is for super-admin

            foreach($superadminEmailRaw as $superRaw){
                array_push($userEmailArr,$superRaw->email);
            }
            //end getting super-admin email and adding to email array

            $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_SUBMIT_USER' LIMIT 1");

            //start changing $title to title names
            if($title == 1){
                $user_title = "Dr.";
            }
            elseif($title == 2){
                $user_title = "Professor";
            }
            elseif($title == 3){
                $user_title = "Mr.";
            }
            elseif($title == 4){
                $user_title = "Mrs.";
            }
            else{
                $user_title = "Ms.";
            }
            //end changing $title to title names

            $userContent = "<p>Dear ".$user_title." ".$last_name.",<p>";
            if(isset($userContentRaw) && count($userContentRaw)>0){
                $userContent .= $userContentRaw[0]->description;
            }
            else{
                $userContent .= "Abstract Submission Reply...";
            }

            if(isset($userEmailArr) && count($userEmailArr)>0){
                Mail::send([], [], function($message) use($userEmailArr,$userContent) {
                    $message->to($userEmailArr)->subject('Abstract Submission Reply')->setBody($userContent, 'text/html');;
//                    Attach file
//                    $message->attach($attach);
                });
            }
            //end sending email to user

            //start sending email to admin
//            $attach = public_path().'/'.$abstractform->abstract_file_path;
            $attach = $abstractform->abstract_file_path;

            $emailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 1"); //type = 1 is for abstract

            $emailArr = array();
            foreach($emailRaw as $eRaw){
                array_push($emailArr,$eRaw->email);
            }

            //start getting super-admin email and adding to email array
            $superadminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 3"); //type = 3 is for super-admin

            foreach($superadminEmailRaw as $superRaw){
                array_push($emailArr,$superRaw->email);
            }
            //end getting super-admin email and adding to email array

            $content = "<p>Dear Sir/Madam,<p>";

            $contentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_SUBMIT_ADMIN' LIMIT 1");
            if(isset($contentRaw) && count($contentRaw)>0){
                $content .= $contentRaw[0]->description;
            }
            else{
                $content .= "Abstract Submission Reply...";
            }

            if(isset($emailArr) && count($emailArr)>0){
                Mail::send([], [], function($message) use($emailArr,$content,$attach) {
                    $message->to($emailArr)->subject('Abstract Submission Reply...')->setBody($content, 'text/html');
                    //Attach file
                    $message->attach($attach);
                });
            }
            //end sending email to admin

            alert()->success('Abstract Form successfully added. ')->persistent('OK');
            return redirect()->action('Frontend\AbstractformController@create')
                ->withMessage(FormatGenerator::message('Success', 'File added ...'));
        }
        else{
            return redirect()->action('Frontend\AbstractformController@create')
                ->withMessage(FormatGenerator::message('Fail', 'File did not add ...'));
        }
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

        return view('frontend.abstractform.abstractform_call')->with('countries', $countries)->with('page', $page)->with('posts', $posts)->with('images', $images)->with('$status', $status);
    }

}
