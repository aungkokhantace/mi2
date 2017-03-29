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

            foreach($abstractforms as $absTitle){
                if($absTitle->title == 1){
                    $absTitle->title = "Dr.";
                }
                elseif($absTitle->title == 2){
                    $absTitle->title = "Professor";
                }
                elseif($absTitle->title == 3){
                    $absTitle->title = "Mr.";
                }
                elseif($absTitle->title == 4){
                    $absTitle->title = "Mrs.";
                }
                else{
                    $absTitle->title = "Ms.";
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
        $title     = Input::get('title');
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
        $abstractform->title = $title;
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

           /* if($email_template == "oral"){
                //ABS_CONFIRM_USER_1 is for oral presentation
                $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_USER_1' LIMIT 1");
            }
            else{
                //ABS_CONFIRM_USER_2 is for poster presentation
                $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_USER_2' LIMIT 1");
            }  */

//            $userContent = "<p>Dear ".$abstractform->first_name.",<p>";
            /*if(isset($userContentRaw) && count($userContentRaw)>0){
                $userContent .= $userContentRaw[0]->description;
            }
            else{
                $userContent .= "Abstract Confirmation Reply...";
            } */

            //start constructing email template
            //start getting email content
            if($email_template == "oral"){
                //ABS_CONFIRM_USER_1 is for oral presentation
                $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_USER_1' LIMIT 1");
            }
            else{
                //ABS_CONFIRM_USER_2 is for poster presentation
                $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_USER_2' LIMIT 1");
            }

//                $userContent = "<p>Dear ".$register->first_name.",<p>";
            if(isset($userContentRaw) && count($userContentRaw)>0){
                $userContent = $userContentRaw[0]->description;
            }
            else{
                $userContent = "Abstract Confirmation Reply...";
            }
            //end getting email content

            //start getting letterHead Image and Date
            $letterHeadImage = public_path().'/images/LetterHead.jpg';

            $date = date("d-m-Y");                              //date for email

            //get recipient of email
            $to = "To : ";
//            //recipient with middle name
//            if(isset($abstractform->middle_name) && $abstractform->middle_name != ""){
//                $to  .=  $abstractform->first_name.' '.$abstractform->middle_name.' '.$abstractform->last_name.'<br><br>';
//            }
//            //recipient without middle name
//            else{
//                $to  .=  $abstractform->first_name.' '.$abstractform->last_name.'<br><br>';
//            }
//            //end getting recipient of email

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

            $to .= $user_title." ".$last_name;

            //get event title
            $eventTitle  = Utility::getEventTitle();

            //start signature section
            $sincerely   = Utility::getSincerely();
            $signatureImage = public_path().'/images/Sign.jpg';
            $presidentInfo = Utility::getPresidentInfo();
            //end signature section

            //get footer of email template
            $emailFooterBeforeLogo = Utility::getEmailFooterBeforeLogo();
            $footerLogoImage       = public_path().'/images/FooterLogos.jpg';
            $emailFooterAfterLogo  = Utility::getEmailFooterAfterLogo();
            //end constructing email template

        /*    if(isset($userEmailArr) && count($userEmailArr)>0){
                Mail::send([], [], function($message) use($userEmailArr,$userContent) {
                    $message->to($userEmailArr)->subject('Abstract Confirmation Reply')->setBody($userContent, 'text/html');;
//                    Attach file
//                    $message->attach($attach);
                });
            } */

            if(isset($userEmailArr) && count($userEmailArr)>0){
                Mail::send([], [], function($message) use($userEmailArr,$letterHeadImage,$date,$to,$eventTitle,$userContent,$sincerely,$signatureImage,$presidentInfo,$emailFooterBeforeLogo,$footerLogoImage,$emailFooterAfterLogo) {
                    $message->to($userEmailArr)->subject('Abstract Confirmation Reply')
                        ->setBody('<img src="'.$message->embed($letterHeadImage).'" alt="header image" style="width:100%;height:100%;" /><br><br>'
                            .$date.'<br><br><br>'
                            .$to.'<br><br>'
                            .$eventTitle.'<br>'
                            .$userContent.'<br><br><br><br><br>'
                            .$sincerely.'<br><br>'
                            .'<img src="'.$message->embed($signatureImage).'" alt="signature image" style="width:20%;height:20%;" /><br><br>'
                            .$presidentInfo.'<br><br><br><br>'
                            .$emailFooterBeforeLogo.'<img src="'.$message->embed($footerLogoImage).'" alt="footer logos" style="width:100%;height:25%;" /><br><br>'.$emailFooterAfterLogo, 'text/html');
                });
            }
            //end sending email to user

            //start sending email to admin
//            $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL");
            $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 1"); //type = 1 is for abstract
            $adminEmailArr = array();
            foreach($adminEmailRaw as $eRaw){
                array_push($adminEmailArr,$eRaw->email);
            }

          /*  //$adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'REG_confirm_ADMIN' LIMIT 1");
            if($email_template == "oral"){
                //ABS_CONFIRM_ADMIN_1 is for oral presentation
                $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_ADMIN_1' LIMIT 1");
            }
            else{
                //ABS_CONFIRM_ADMIN_2 is for poster presentation
                $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_ADMIN_2' LIMIT 1");
            }  */

            /*   $adminContent = "<p>Dear Sir/Madam,<p>";
            if(isset($adminContentRaw) && count($adminContentRaw)>0){
                $adminContent .= $adminContentRaw[0]->description;
            }
            else{
                $adminContent .= "Abstract Confirmation Reply...";
            }
            */

            //start constructing email template
            //start getting email content
            if($email_template == "oral"){
                //ABS_CONFIRM_ADMIN_1 is for oral presentation
                $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_ADMIN_1' LIMIT 1");
            }
            else{
                //ABS_CONFIRM_ADMIN_2 is for poster presentation
                $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_CONFIRM_ADMIN_2' LIMIT 1");
            }

//                $adminContent = "<p>Dear ".$register->first_name.",<p>";
            if(isset($adminContentRaw) && count($adminContentRaw)>0){
                $adminContent = $userContentRaw[0]->description;
            }
            else{
                $adminContent = "Abstract Confirmation Reply...";
            }
            //end getting email content

            //start getting letterHead Image and Date
            $letterHeadImage = public_path().'/images/LetterHead.jpg';

            $date = date("d-m-Y");                              //date for email

            //get recipient of email
            $to = "To : Admin";
            //end getting recipient of email

            //get event title
            $eventTitle  = Utility::getEventTitle();

            //start signature section
            $sincerely   = Utility::getSincerely();
            $signatureImage = public_path().'/images/Sign.jpg';
            $presidentInfo = Utility::getPresidentInfo();
            //end signature section

            //get footer of email template
            $emailFooterBeforeLogo = Utility::getEmailFooterBeforeLogo();
            $footerLogoImage       = public_path().'/images/FooterLogos.jpg';
            $emailFooterAfterLogo  = Utility::getEmailFooterAfterLogo();
            //end constructing email template

         /*   if(isset($adminEmailArr) && count($adminEmailArr)>0){
                Mail::send([], [], function($message) use($adminEmailArr,$adminContent) {
                    $message->to($adminEmailArr)->subject('Abstract Confirmation Reply')->setBody($adminContent, 'text/html');
                    if(isset($attach) && $attach != ""){
                        //Attach file
//                        $message->attach($attach);
                    }
                });
            }  */

            if(isset($adminEmailArr) && count($adminEmailArr)>0){
                Mail::send([], [], function($message) use($adminEmailArr,$letterHeadImage,$date,$to,$eventTitle,$adminContent,$sincerely,$signatureImage,$presidentInfo,$emailFooterBeforeLogo,$footerLogoImage,$emailFooterAfterLogo) {
                    $message->to($adminEmailArr)->subject('Abstract Confirmation Reply')
                        ->setBody('<img src="'.$message->embed($letterHeadImage).'" alt="header image" style="width:100%;height:100%;" /><br><br>'
                            .$date.'<br><br><br>'
                            .$to.'<br><br>'
                            .$eventTitle.'<br>'
                            .$adminContent.'<br><br><br><br><br>'
                            .$sincerely.'<br><br>'
                            .'<img src="'.$message->embed($signatureImage).'" alt="signature image" style="width:20%;height:20%;" /><br><br>'
                            .$presidentInfo.'<br><br><br><br>'
                            .$emailFooterBeforeLogo.'<img src="'.$message->embed($footerLogoImage).'" alt="footer logos" style="width:100%;height:25%;" /><br><br>'.$emailFooterAfterLogo, 'text/html');
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
        $title      = Input::get('title');
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
        $abstractform->title = $title;
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

//            $userContent = "<p>Dear ".$abstractform->first_name.",<p>";
            $userContent = "<p>Dear ".$user_title." ".$last_name.",<p>";

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
//            $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL");
            $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 1"); //type = 1 is for abstract
            $adminEmailArr = array();
            foreach($adminEmailRaw as $eRaw){
                array_push($adminEmailArr,$eRaw->email);
            }

            $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'ABS_REJECT_ADMIN' LIMIT 1");

            $adminContent = "<p>Dear Sir/Madam,<p>";
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

