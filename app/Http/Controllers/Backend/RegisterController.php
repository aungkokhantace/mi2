<?php
namespace App\Http\Controllers\Backend;

use App\Backend\MedicalSpeciality\MedicalSpecialityRepository;
use App\Backend\Register\AppRegister;
use App\Backend\Permission\Permission;
use App\Backend\RegistrationCategory\RegistrationCategoryRepository;
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
use App\Backend\Infrastructure\Forms\RegisterEditRequest;
use App\Core\Utility;
use Illuminate\Support\Facades\Mail;
use InterventionImage;


class RegisterController extends Controller
{   

    public function __construct()
    {        
    }

    public function index(Request $request)
    {
        if (Auth::guard('User')->check()) {

            $registerRepo = new RegisterRepository();
            $registers      = $registerRepo->getregisters();

            $countries = Utility::getSettingsByType("COUNTRY");
            foreach ($registers as $regCountry)
            {
                $tempCountryId = $regCountry->country;
                $countryName = $countries[$tempCountryId];
                $regCountry->country_name = $countryName;
            }

//            foreach($registers as $regCategory){
//                if(isset($regCategory->registration_category) && $regCategory->registration_category == 1){
//                    $regCategory->registration_category = "International Delegate";
//                }
//                elseif(isset($regCategory->registration_category) && $regCategory->registration_category == 2){
//                    $regCategory->registration_category = "Local Delegate";
//                }
//                else{
//                    $regCategory->registration_category = "Local Trainee";
//                }
//            }

            foreach($registers as $regPayment){
                if(isset($regPayment->payment_type) && $regPayment->payment_type == 1){
                    $regPayment->payment_type = "Cash";
                }
                else{
                    $regPayment->payment_type = "Bank Transfer";
                }
            }


            foreach($registers as $regSpeciality){
                if($regSpeciality->medical_speciality_id == 0){
                    //if user chose "other" in medical speciality, medical_speciality_id is 0 and medical_speciality_other is shown instead!!
                    $regSpeciality->medical_speciality_name = $regSpeciality->medical_speciality_other;
                }
                else{
                    //if medical_speciality is not 0, show medical_speciality_name
                    $regSpeciality->medical_speciality_name = $regSpeciality->medical_speciality->name;
                }
            }

            foreach($registers as $regTitle){
                if($regTitle->title == 1){
                    $regTitle->title = "Dr.";
                }
                elseif($regTitle->title == 2){
                    $regTitle->title = "Professor";
                }
                elseif($regTitle->title == 3){
                    $regTitle->title = "Mr.";
                }
                elseif($regTitle->title == 4){
                    $regTitle->title = "Mrs.";
                }
                else{
                    $regTitle->title = "Ms.";
                }
            }
            return view('backend.register.index')
                        ->with('registers', $registers);
          }
        return redirect('backend/login');
    }


   public function store(RegisterEntryRequest $request)
    {
        $request->validate();
        $first_name           = Input::get('first_name');
        $middle_name          = Input::get('middle_name');
        $last_name            = Input::get('last_name');
        $title                = Input::get('title');
        $email                = Input::get('email');
        $country              = Input::get('country');
        $where_work           = Input::get('where_work');
        $medical_specialities = Input::get('medical_specialities');
        $phone_no             = Input::get('phone_no');
        $registration_category= Input::get('registration_category');
        $payment_type         = Input::get('payment_type');

        $register = new Register();
        $register->first_name = $first_name;
        $register->middle_name = $middle_name;
        $register->last_name = $last_name;
        $register->title = $title;
        $register->email = $email;
        $register->country = $country;
        $register->where_work = $where_work;
        $register->medical_specialities = $medical_specialities;
        $register->phone_no = $phone_no;
        $register->registration_category = $registration_category;
        $register->payment_type = $payment_type;

        $registerRepo = new RegisterRepository();
        $result = $registerRepo->create($register);
        
        return redirect()->action('Backend\RegisterController@index');
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $registerRepo = new RegisterRepository();
            $registers      = $registerRepo->getObjByID($id);
            $countries = Utility::getSettingsByType("COUNTRY");

            $medicalspecialityRepo = new MedicalSpecialityRepository();
            $medicalspecialities   = $medicalspecialityRepo->getObjs();

            $specialitiesArr = array();
            foreach($medicalspecialities as $k=>$medicalspeciality){
                if($medicalspeciality->option_group_name == null){
                    $specialitiesArr["main_speciality"][$k] = $medicalspeciality;
                }
                elseif(isset($medicalspeciality->option_group_name) && $medicalspeciality->option_group_name != null){
                    $specialitiesArr[$medicalspeciality->option_group_name][$k] = $medicalspeciality;
                }
            }

            $registrationCategoryRepo = new RegistrationCategoryRepository();
            $registrationCategories   = $registrationCategoryRepo->getObjs();

            return view('backend.register.register_backend')->with('countries', $countries)->with('registers', $registers)->with('specialitiesArr', $specialitiesArr)->with('registrationCategories', $registrationCategories);
        }
        return redirect('/login');
    }

     public function update(RegisterEditRequest $request){

            $id                   = Input::get('id');
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

             //Start image section
             $removeImageFlag = (Input::has('removeImageFlag')) ? Input::get('removeImageFlag') : 0;

             if((Input::hasFile('photo'))){
                 $file = Input::file('photo');

                 $path = base_path().'/public/images/registration';
                 if ( ! file_exists($path))
                 {
                     mkdir($path, 0777, true);
                 }
                 $extension = Input::file('photo')->getClientOriginalExtension();
                 $img_name  = uniqid().'.' .$extension;

                 $payment_reference_path = 'images/registration/' .$img_name;

                 // moving image into image folder
                 $file->move($path, $img_name);

                 $rWidth = 1.0;
                 $rHeight =  1.0;

                 // getting image width and height
                 $imgData = getimagesize($path . '/' . $img_name);
                 $width = $imgData[0];
                 $imgWidth = $width * $rWidth;
                 $height = $imgData[1];
                 $imgHeight = $height * $rHeight;

                 // resizing image
                 $image = InterventionImage::make(sprintf($path .'/%s', $img_name))->resize($imgWidth, $imgHeight)->save();
             }
             else{
                 $payment_reference_path = "";
             }
             //End image section


            $register = Register::find($id);
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

            if(isset($payment_reference_path) && $payment_reference_path !== ""){
                $register->payment_reference_path = $payment_reference_path;
            }

             if($removeImageFlag == 1){
                 $register->payment_reference_path = "";
             }
//            $register->status                = "Pending";

            $registerRepo = new RegisterRepository();
            $result = $registerRepo->update($register);

         if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
             return redirect()->action('Backend\RegisterController@index')
                 ->withMessage(FormatGenerator::message('Success', 'Registration updated ...'));
         }
         else{
             return redirect()->action('Backend\RegisterController@index')
                 ->withMessage(FormatGenerator::message('Fail', 'Registration did not update ...'));
         }
        }

         public function destroy(){
            $id         = Input::get('selected_checkboxes');
            $new_string = explode(',', $id);
            foreach($new_string as $id){
                $registerRepo = new RegisterRepository();
                $registerRepo->delete_registers($id);
            }
            return redirect()->action('Backend\RegisterController@index');
        }

        public function confirm($id){
            $registerRepo   = new RegisterRepository();
            $register       = $registerRepo->getObjByID($id);

            /*
            if(isset($register->registration_category) && $register->registration_category == 1){
                $register->registration_category = "International Delegate";
            }
            elseif(isset($register->registration_category) && $register->registration_category == 2){
                $register->registration_category = "Local Delegate";
            }
            else{
                $register->registration_category = "Local Trainee";
            }

            if(isset($register->country)){
                $country_name = Utility::getCountryNameByValue($register->country);
                $register->country = $country_name;
            }

            if(isset($register->payment_type) && $register->payment_type == 1){
                $register->payment_type = "Cash";
            }
            else{
                $register->payment_type = "Bank Transfer";
            }

            if($register->medical_speciality_id == 0){
                //if user choose "other" in medical speciality, medical_speciality_id is 0 and medical_speciality_other is shown instead!!
                $register->medical_speciality_name = $register->medical_speciality_other;
            }
            else{
                //if medical_speciality is not 0, show medical_speciality_name
                $register->medical_speciality_name = $register->medical_speciality->name;
            }
            */

            $countries = Utility::getSettingsByType("COUNTRY");

            $medicalspecialityRepo = new MedicalSpecialityRepository();
            $medicalspecialities   = $medicalspecialityRepo->getObjs();

            $specialitiesArr = array();
            foreach($medicalspecialities as $k=>$medicalspeciality){
                if($medicalspeciality->option_group_name == null){
                    $specialitiesArr["main_speciality"][$k] = $medicalspeciality;
                }
                elseif(isset($medicalspeciality->option_group_name) && $medicalspeciality->option_group_name != null){
                    $specialitiesArr[$medicalspeciality->option_group_name][$k] = $medicalspeciality;
                }
            }

            $registrationCategoryRepo = new RegistrationCategoryRepository();
            $registrationCategories   = $registrationCategoryRepo->getObjs();

            return view('backend.register.register_confirm')->with('register',$register)->with('countries', $countries)->with('specialitiesArr', $specialitiesArr)->with('registrationCategories', $registrationCategories);
        }

        public function registerConfirm()
        {
            $id   = Input::get('id');

            $first_name           = Input::get('first_name');
            $middle_name          = Input::get('middle_name');
            $last_name            = Input::get('last_name');
            $title                = Input::get('title');
            $email                = Input::get('email');
            $country              = Input::get('country');
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
//            $registered_date      = date("Y-m-d");

            $file = Input::file('register_image');
            if(isset($file) && count($file)>0){
                $path = base_path().'/public/images/registration';
                if ( ! file_exists($path))
                {
                    mkdir($path, 0777, true);
                }
                $extension = Input::file('register_image')->getClientOriginalExtension();
                $img_name  = uniqid().'.' .$extension;

                $payment_reference_path = 'images/registration/' .$img_name;


                // moving image into image folder
                $file->move($path, $img_name);

                $rWidth = 1.0;
                $rHeight =  1.0;

                // getting image width and height
                $imgData = getimagesize($path . '/' . $img_name);
                $width = $imgData[0];
                $imgWidth = $width * $rWidth;
                $height = $imgData[1];
                $imgHeight = $height * $rHeight;

                // resizing image
                $image = InterventionImage::make(sprintf($path .'/%s', $img_name))->resize($imgWidth, $imgHeight)->save();
            }
            else{
                $payment_reference_path = "";
            }



            $confirm_by                         = Auth::guard('User')->user()->id;
            $confirmed_date                     = date("Y-m-d");

            $registerRepo                       = new RegisterRepository();
            $register                           = $registerRepo->getObjByID($id);

            $register->first_name               = $first_name;
            $register->middle_name              = $middle_name;
            $register->last_name                = $last_name;
            $register->title                    = $title;
            $register->email                    = $email;
            $register->country                  = $country;
            $register->medical_speciality_id    = $medical_specialities;
            $register->medical_speciality_other = $other_specialities;
            $register->phone_no                 = $phone_no;
            $register->registration_category    = $registration_category;
            $register->payment_type             = $payment_type;

            if(isset($file) && count($file)>0) {
                $register->payment_reference_path = $payment_reference_path;
            }
            $register->status                   = 'confirm';
            $register->confirmed_by             = $confirm_by;
            $register->confirmed_date           = $confirmed_date;

            $result = $registerRepo->update($register);

            if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
                //start sending email to user
                $userEmailArr = array();
                $userEmailArr[0] = $register->email;

                //start getting super-admin email and adding to email array
                $superadminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 3"); //type = 3 is for super-admin

                foreach($superadminEmailRaw as $superRaw){
                    array_push($userEmailArr,$superRaw->email);
                }
                //end getting super-admin email and adding to email array

                //start constructing email template
                //start getting email content
                $userContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'REG_CONFIRM_USER' LIMIT 1");

//                $userContent = "<p>Dear ".$register->first_name.",<p>";
                if(isset($userContentRaw) && count($userContentRaw)>0){
                    $userContent = $userContentRaw[0]->description;
                }
                else{
                    $userContent = "Registration Confirmation Reply...";
                }

                $early_bird_date = Utility::getEarlyBirdDate();

                $registrationCategoryRepo = new RegistrationCategoryRepository();
                $regCategoryObj = $registrationCategoryRepo->getObjByID($registration_category);

                $registered_date = $register->registered_date;

                if($registered_date <= $early_bird_date){
                    $fee_amount = $regCategoryObj->early_bird_fee;
                }
                else{
                    $fee_amount = $regCategoryObj->normal_fee;
                }

                if($regCategoryObj->currency_type == "usd"){
                    $currency_unit = "$";
                }
                else{
                    $currency_unit = "MMK ";
                }

                $fee     = $currency_unit.$fee_amount;

                $reg_cat = $regCategoryObj->name;

                $userContent = str_replace("[[{{!!fee_amt_variable!!}}]]",$fee,$userContent);
                $userContent = str_replace("[[{{!!reg_cat_variable!!}}]]",$reg_cat,$userContent);

                //end getting email content

                //start getting letterHead Image and Date
                $letterHeadImage = public_path().'/images/LetterHead.jpg';

                $date = date("d-m-Y");                              //date for email

                //get recipient of email
                $to = "To : ";
//                //recipient with middle name
//                if(isset($register->middle_name) && $register->middle_name != ""){
//                    $to  .=  $register->first_name.' '.$register->middle_name.' '.$register->last_name.'<br><br>';
//                }
//                //recipient without middle name
//                else{
//                    $to  .=  $register->first_name.' '.$register->last_name.'<br><br>';
//                }
//                //end getting recipient of email

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


                /*if(isset($userEmailArr) && count($userEmailArr)>0){
                    Mail::send([], [], function($message) use($userEmailArr,$email_template) {
                        $message->to($userEmailArr)->subject('Registration Confirmation Reply')->setBody($email_template, 'text/html');
                        //Attach file
                        //$message->attach($attach);
                    });
                } */

                if(isset($userEmailArr) && count($userEmailArr)>0){
                    Mail::send([], [], function($message) use($userEmailArr,$letterHeadImage,$date,$to,$eventTitle,$userContent,$sincerely,$signatureImage,$presidentInfo,$emailFooterBeforeLogo,$footerLogoImage,$emailFooterAfterLogo) {
                        $message->to($userEmailArr)->subject('Registration Confirmation Reply')
                            ->setBody('<img src="'.$message->embed($letterHeadImage).'" alt="header image" style="width:100%;height:100%;" /><br><br>'
                                .$date.'<br><br><br>'
                                .$to.'<br><br>'
                                .$eventTitle.'<br>'
                                .$userContent.'<br><br><br><br><br>'
                                .$sincerely.'<br><br>'
                                .'<img src="'.$message->embed($signatureImage).'" alt="signature image" style="width:20%;height:20%;" /><br><br>'
                                .$presidentInfo.'<br><br><br><br>'
                                .$emailFooterBeforeLogo.'<img src="'.$message->embed($footerLogoImage).'" alt="footer logos" style="width:100%;height:25%;" /><br><br>'.$emailFooterAfterLogo, 'text/html');

                        //Attach file
                        //$message->attach($attach);
                    });
                }
                //end sending email to user

                //start sending email to admin
                $attach = $payment_reference_path;
//                $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL");
                $adminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 2"); //type = 2 is for register
                $adminEmailArr = array();
                foreach($adminEmailRaw as $eRaw){
                    array_push($adminEmailArr,$eRaw->email);
                }

                //start getting super-admin email and adding to email array
                $superadminEmailRaw = DB::select("SELECT * FROM event_emails WHERE deleted_at IS NULL AND type = 3"); //type = 3 is for super-admin

                foreach($superadminEmailRaw as $superRaw){
                    array_push($adminEmailArr,$superRaw->email);
                }
                //end getting super-admin email and adding to email array

//                $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'REG_CONFIRM_ADMIN' LIMIT 1");
//
//                $adminContent = "<p>Dear Sir/Madam,<p>";
//                if(isset($adminContentRaw) && count($adminContentRaw)>0){
//                    $adminContent .= $adminContentRaw[0]->description;
//                }
//                else{
//                    $adminContent .= "Registration Confirmation Reply...";
//                }

                //start constructing email template
                //start getting email content
                $adminContentRaw = DB::select("SELECT * FROM core_settings WHERE code = 'REG_CONFIRM_ADMIN' LIMIT 1");

//                $adminContent = "<p>Dear ".$register->first_name.",<p>";
                if(isset($adminContentRaw) && count($adminContentRaw)>0){
                    $adminContent = $adminContentRaw[0]->description;
                }
                else{
                    $adminContent = "Registration Confirmation Reply...";
                }

                $early_bird_date = Utility::getEarlyBirdDate();

                $registrationCategoryRepo = new RegistrationCategoryRepository();
                $regCategoryObj = $registrationCategoryRepo->getObjByID($registration_category);

                $registered_date = $register->registered_date;

                if($registered_date <= $early_bird_date){
                    $fee_amount = $regCategoryObj->early_bird_fee;
                }
                else{
                    $fee_amount = $regCategoryObj->normal_fee;
                }

                if($regCategoryObj->currency_type == "usd"){
                    $currency_unit = "$";
                }
                else{
                    $currency_unit = "MMK ";
                }

                $fee     = $currency_unit.$fee_amount;

                $reg_cat = $regCategoryObj->name;

                $adminContent = str_replace("[[{{!!fee_amt_variable!!}}]]",$fee,$adminContent);
                $adminContent = str_replace("[[{{!!reg_cat_variable!!}}]]",$reg_cat,$adminContent);

                //end getting email content

                //start getting letterHead Image and Date
                $letterHeadImage = public_path().'/images/LetterHead.jpg';

                $date = date("d-m-Y");                              //date for email

                //get recipient of email
                $to = "To : Admin";
                /* //recipient with middle name
                if(isset($register->middle_name) && $register->middle_name != ""){
                    $to  .=  $register->first_name.' '.$register->middle_name.' '.$register->last_name.'<br><br>';
                }
                //recipient without middle name
                else{
                    $to  .=  $register->first_name.' '.$register->last_name.'<br><br>';
                }
                //end getting recipient of email     */

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

                /*if(isset($adminEmailArr) && count($adminEmailArr)>0){
                    Mail::send([], [], function($message) use($adminEmailArr,$adminContent,$attach) {
                        $message->to($adminEmailArr)->subject('Registration Confirmation Reply')->setBody($adminContent, 'text/html');
                        if(isset($attach) && $attach != ""){
                            //Attach file
                            $message->attach($attach);
                        }
                    });
                }*/

                if(isset($adminEmailArr) && count($adminEmailArr)>0){
                    Mail::send([], [], function($message) use($adminEmailArr,$letterHeadImage,$date,$to,$eventTitle,$adminContent,$sincerely,$signatureImage,$presidentInfo,$emailFooterBeforeLogo,$footerLogoImage,$emailFooterAfterLogo,$attach) {
                        $message->to($adminEmailArr)->subject('Registration Confirmation Reply')
                            ->setBody('<img src="'.$message->embed($letterHeadImage).'" alt="header image" style="width:100%;height:100%;" /><br><br>'
                                .$date.'<br><br><br>'
                                .$to.'<br><br>'
                                .$eventTitle.'<br>'
                                .$adminContent.'<br><br><br><br><br>'
                                .$sincerely.'<br><br>'
                                .'<img src="'.$message->embed($signatureImage).'" alt="signature image" style="width:20%;height:20%;" /><br><br>'
                                .$presidentInfo.'<br><br><br><br>'
                                .$emailFooterBeforeLogo.'<img src="'.$message->embed($footerLogoImage).'" alt="footer logos" style="width:100%;height:25%;" /><br><br>'.$emailFooterAfterLogo, 'text/html');
                        if(isset($attach) && $attach != ""){
                            //Attach file
                            $message->attach($attach);
                        }
                    });

                }

                //end sending email to admin

//                alert()->success('Registration successfully created. ')->persistent('OK');
                return redirect()->action('Backend\RegisterController@index')
                    ->withMessage(FormatGenerator::message('Success', 'Registration confirmed ...'));
            }
            else{
                return redirect()->action('Backend\RegisterController@index')
                    ->withMessage(FormatGenerator::message('Fail', 'Registration did not confirm ...'));
            }

        }
       
}
