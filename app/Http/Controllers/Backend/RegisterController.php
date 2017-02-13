<?php
namespace App\Http\Controllers\Backend;

use App\Backend\MedicalSpeciality\MedicalSpecialityRepository;
use App\Backend\Register\AppRegister;
use App\Backend\Permission\Permission;
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

            foreach($registers as $regCategory){
                if(isset($regCategory->registration_category) && $regCategory->registration_category == 1){
                    $regCategory->registration_category = "International Delegate";
                }
                elseif(isset($regCategory->registration_category) && $regCategory->registration_category == 2){
                    $regCategory->registration_category = "Local Delegate";
                }
                else{
                    $regCategory->registration_category = "Local Trainee";
                }
            }

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

            return view('backend.register.register_backend')->with('countries', $countries)->with('registers', $registers)->with('specialitiesArr', $specialitiesArr);
            return redirect('/login');
    }
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
            $register->status                = "Pending";

            $registerRepo = new RegisterRepository();
            $registerRepo->update($register);
            return redirect()->action('Backend\RegisterController@index');
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
                //if user chose "other" in medical speciality, medical_speciality_id is 0 and medical_speciality_other is shown instead!!
                $register->medical_speciality_name = $register->medical_speciality_other;
            }
            else{
                //if medical_speciality is not 0, show medical_speciality_name
                $register->medical_speciality_name = $register->medical_speciality->name;
            }

            return view('backend.register.register_confirm')->with('register',$register);
        }

        public function registerConfirm()
        {
            $id   = Input::get('id');
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


            $confirm_by                         = Auth::guard('User')->user()->id;
            $confirmed_date                     = date("Y-m-d");

            $registerRepo                       = new RegisterRepository();
            $register                           = $registerRepo->getObjByID($id);
            if(isset($file) && count($file)>0) {
                $register->payment_reference_path = $payment_reference_path;
            }
            $register->status                   = 'confirm';
            $register->confirmed_by             = $confirm_by;
            $register->confirmed_date             = $confirmed_date;
            $registerRepo->update($register);

            return redirect()->action('Backend\RegisterController@index');

        }
       
}
