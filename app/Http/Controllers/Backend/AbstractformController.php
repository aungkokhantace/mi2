<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 10:55 AM
 */

namespace App\Http\Controllers\Backend;

use App\Backend\MedicalSpeciality\MedicalSpecialityRepository;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Backend\Abstractform\AbstractformRepositoryInterface;
use App\Backend\File\FileUploadDownloadRepository;
use App\Backend\File\FileUploadDownloadRepositoryInterface;
use App\Backend\File\FileUploadDownload;
use App\Backend\Abstractform\Abstractform;
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


class AbstractformController extends Controller
{

    private $abstractformRepository;

    public function __construct(AbstractformRepositoryInterface $abstractformRepository)
    {
        $this->abstractformRepository = $abstractformRepository;
    }

    public function index(Request $request)
    {
        if (Auth::guard('User')->check()) {
            $abstractforms = $this->abstractformRepository->getAbstractforms();
//            $abstractforms      = DB::select("SELECT * FROM event_abstract WHERE deleted_at IS NULL");
            $countries = Utility::getSettingsByType("COUNTRY");

            foreach ($abstractforms as $absCountry) {
                $tempCountryId = $absCountry->country;
                $countryName = $countries[$tempCountryId];
                $absCountry->country = $countryName;
            }

            foreach ($abstractforms as $absStatus) {
                $absStatus->status = strtoupper($absStatus->status);
            }

            foreach ($abstractforms as $absSpeciality) {
                if ($absSpeciality->medical_speciality_id == 0) {
                    //if user chose "other" in medical speciality, medical_speciality_id is 0 and medical_speciality_other is shown instead!!
                    $absSpeciality->medical_speciality_name = $absSpeciality->medical_speciality_other;
                } else {
                    //if medical_speciality is not 0, show medical_speciality_name
                    $absSpeciality->medical_speciality_name = $absSpeciality->medical_speciality->name;
                }
            }

            return view('backend.abstractform.index')->with('abstractforms', $abstractforms)->with('countries', $countries);
        }
        return redirect('/login');
    }

    public function edit($id)
    {
        if (Auth::guard('User')->check()) {

            $abstractforms = $this->abstractformRepository->getObjByID($id);
            $countries = Utility::getSettingsByType("COUNTRY");

            $medicalspecialityRepo = new MedicalSpecialityRepository();
            $medicalspecialities = $medicalspecialityRepo->getObjs();

            $specialitiesArr = array();
            foreach ($medicalspecialities as $k => $medicalspeciality) {
                if ($medicalspeciality->option_group_name == null) {
                    $specialitiesArr["main_speciality"][$k] = $medicalspeciality;
                } elseif (isset($medicalspeciality->option_group_name) && $medicalspeciality->option_group_name != null) {
                    $specialitiesArr[$medicalspeciality->option_group_name][$k] = $medicalspeciality;
                }
            }

            return view('backend.abstractform.abstractform')->with('abstractforms', $abstractforms)->with('countries', $countries)->with('specialitiesArr', $specialitiesArr);
        }
        return redirect('/backend/login');
    }

    public function edit_reject($id)
    {
        if (Auth::guard('User')->check()) {

            $abstractforms = $this->abstractformRepository->getObjByID($id);
            $countries = Utility::getSettingsByType("COUNTRY");

            $medicalspecialityRepo = new MedicalSpecialityRepository();
            $medicalspecialities = $medicalspecialityRepo->getObjs();

            $specialitiesArr = array();
            foreach ($medicalspecialities as $k => $medicalspeciality) {
                if ($medicalspeciality->option_group_name == null) {
                    $specialitiesArr["main_speciality"][$k] = $medicalspeciality;
                } elseif (isset($medicalspeciality->option_group_name) && $medicalspeciality->option_group_name != null) {
                    $specialitiesArr[$medicalspeciality->option_group_name][$k] = $medicalspeciality;
                }
            }

            return view('backend.abstractform.abstractform_reject')->with('abstractforms', $abstractforms)->with('countries', $countries)->with('specialitiesArr', $specialitiesArr);
        }
        return redirect('/backend/login');
    }

    public function update(AbstractformEditRequest $request)
    {
        $id = Input::get('id');
        $first_name = Input::get('first_name');
        $middle_name = Input::get('middle_name');
        $last_name = Input::get('last_name');
        $email = Input::get('email');
        $country = Input::get('country');
        $medical_specialities = Input::get('medical_specialities');
        if ($medical_specialities == "other") {
            $medical_specialities = 0;
            $other_specialities = Input::get('other');
        } else {
            $other_specialities = null;
        }

        $confirmed_date = date("Y-m-d");
        $confirmed_by = Auth::guard('User')->user()->id;

        $email_template = Input::get('email_template'); //email_template to send with

        $abstractform = Abstractform::find($id);
        $abstractform->first_name = $first_name;
        $abstractform->middle_name = $middle_name;
        $abstractform->last_name = $last_name;
        $abstractform->email = $email;
        $abstractform->country = $country;
//        $abstractform->medical_specialities  = $medical_specialities;
        $abstractform->medical_speciality_id = $medical_specialities;
        $abstractform->medical_speciality_other = $other_specialities;

        $abstractform->status = "confirm";

//        if(Input::get('confirm')) {
//            $abstractform->status = "confirm";
//        }
//        else{
//            $abstractform->status = "reject";
//        }

        $abstractform->registered = 0;
        $abstractform->confirmed_date = $confirmed_date;
        $abstractform->confirmed_by = $confirmed_by;

        $result = $this->abstractformRepository->update($abstractform);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            //start sending email to user
            $userEmailArr = array();
            $userEmailArr[0] = $email;

            if($email_template == "oral"){
                //ABS_CONFIRM_USER_1 is for oral presentation
                $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_USER_1' LIMIT 1");
            }
            else{
                //ABS_CONFIRM_USER_2 is for poster presentation
                $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_USER_2' LIMIT 1");
            }

            $userContent = "<p>Dear ".$abstractform->first_name.",<p>";
            if(isset($userContentRaw) && count($userContentRaw)>0){
                $userContent .= $userContentRaw[0]->description;
            }
            else{
                $userContent .= "Abstract Confirmation Reply...";
            }

            if(isset($userEmailArr) && count($userEmailArr)>0){
                Mail::send([], [], function($message) use($userEmailArr,$userContent) {
                    $message->to($userEmailArr)->subject('Abstract Confirmation Reply')->setBody($userContent, 'text/html');;
//                    Attach file
//                    $message->attach($attach);
                });
            }
            //end sending email to user

            //start sending email to admin
            $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL");
            $adminEmailArr = array();
            foreach($adminEmailRaw as $eRaw){
                array_push($adminEmailArr,$eRaw->email);
            }

//            $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'REG_confirm_ADMIN' LIMIT 1");
            if($email_template == "oral"){
                //ABS_CONFIRM_ADMIN_1 is for oral presentation
                $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_ADMIN_1' LIMIT 1");
            }
            else{
                //ABS_CONFIRM_ADMIN_2 is for poster presentation
                $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_ADMIN_2' LIMIT 1");
            }

            $adminContent = "<p>Dear Sir,<p>";
            if(isset($adminContentRaw) && count($adminContentRaw)>0){
                $adminContent .= $adminContentRaw[0]->description;
            }
            else{
                $adminContent .= "Abstract Confirmation Reply...";
            }

            if(isset($adminEmailArr) && count($adminEmailArr)>0){
                Mail::send([], [], function($message) use($adminEmailArr,$adminContent) {
                    $message->to($adminEmailArr)->subject('Abstract Confirmation Reply')->setBody($adminContent, 'text/html');
                    if(isset($attach) && $attach != ""){
                        //Attach file
//                        $message->attach($attach);
                    }
                });
            }
            //end sending email to admin

            return redirect()->action('Backend\AbstractformController@index')
                ->withMessage(FormatGenerator::message('Success', 'Abstract confirmed ...'));
        }
        else{
            return redirect()->action('Backend\AbstractformController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Abstract did not confirm ...'));
        }
    }

    public function reject(AbstractformEditRequest $request)
    {
        $id = Input::get('id');
        $first_name = Input::get('first_name');
        $middle_name = Input::get('middle_name');
        $last_name = Input::get('last_name');
        $email = Input::get('email');
        $country = Input::get('country');
        $medical_specialities = Input::get('medical_specialities');
        if ($medical_specialities == "other") {
            $medical_specialities = 0;
            $other_specialities = Input::get('other');
        } else {
            $other_specialities = null;
        }

        $confirmed_date = date("Y-m-d");
        $confirmed_by = Auth::guard('User')->user()->id;

        $abstractform = Abstractform::find($id);
        $abstractform->first_name = $first_name;
        $abstractform->middle_name = $middle_name;
        $abstractform->last_name = $last_name;
        $abstractform->email = $email;
        $abstractform->country = $country;
//        $abstractform->medical_specialities  = $medical_specialities;
        $abstractform->medical_speciality_id = $medical_specialities;
        $abstractform->medical_speciality_other = $other_specialities;

        $abstractform->status = "reject";

//        if(Input::get('confirm')) {
//            $abstractform->status = "confirm";
//        }
//        else{
//            $abstractform->status = "reject";
//        }

        $abstractform->registered = 0;
        $abstractform->confirmed_date = $confirmed_date;
        $abstractform->confirmed_by = $confirmed_by;

        $result = $this->abstractformRepository->update($abstractform);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            //start sending email to user
            $userEmailArr = array();
            $userEmailArr[0] = $email;

            $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_REJECT_USER' LIMIT 1");

            $userContent = "<p>Dear ".$abstractform->first_name.",<p>";
            if(isset($userContentRaw) && count($userContentRaw)>0){
                $userContent .= $userContentRaw[0]->description;
            }
            else{
                $userContent .= "Abstract Rejection Reply...";
            }

            if(isset($userEmailArr) && count($userEmailArr)>0){
                Mail::send([], [], function($message) use($userEmailArr,$userContent) {
                    $message->to($userEmailArr)->subject('Abstract Rejection Reply')->setBody($userContent, 'text/html');;
//                    Attach file
//                    $message->attach($attach);
                });
            }
            //end sending email to user

            //start sending email to admin
            $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL");
            $adminEmailArr = array();
            foreach($adminEmailRaw as $eRaw){
                array_push($adminEmailArr,$eRaw->email);
            }

            $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_REJECT_ADMIN' LIMIT 1");

            $adminContent = "<p>Dear Sir,<p>";
            if(isset($adminContentRaw) && count($adminContentRaw)>0){
                $adminContent .= $adminContentRaw[0]->description;
            }
            else{
                $adminContent .= "Abstract Rejection Reply...";
            }

            if(isset($adminEmailArr) && count($adminEmailArr)>0){
                Mail::send([], [], function($message) use($adminEmailArr,$adminContent) {
                    $message->to($adminEmailArr)->subject('Abstract Rejection Reply')->setBody($adminContent, 'text/html');
                    if(isset($attach) && $attach != ""){
                        //Attach file
//                        $message->attach($attach);
                    }
                });
            }
            //end sending email to admin

            return redirect()->action('Backend\AbstractformController@index')
                ->withMessage(FormatGenerator::message('Success', 'Abstract rejected ...'));
        }
        else{
            return redirect()->action('Backend\AbstractformController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Abstract did not reject ...'));
        }
    }

    public function destroy()
    {
        $id = Input::get('selected_checkboxes');
        $new_string = explode(',', $id);
        foreach ($new_string as $id) {
            $this->abstractformRepository->delete($id);
        }
        return redirect()->action('Backend\AbstractformController@index');
    }

}

