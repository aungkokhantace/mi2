<?php
namespace App\Http\Controllers\Backend;

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
            foreach ($registers as $register)
            {
                $tempCountryId = $register->country;
                $countryName = $countries[$tempCountryId]; 
                $register->country_name = $countryName;
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
            return view('backend.register.register_backend')->with('countries', $countries)->with('registers', $registers);
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
            $where_work           = Input::get('where_work');
            $medical_specialities = Input::get('medical_specialities');
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
            $register->where_work = $where_work;
            $register->medical_specialities = $medical_specialities;
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
            return view('backend.register.register_confirm')->with('register',$register);
        }

        public function registerConfirm()
        {
            $id   = Input::get('id');
            $file = Input::file('register_image');
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

            $confirm_by                         = Auth::guard('User')->user()->id;

            $registerRepo                       = new RegisterRepository();
            $register                           = $registerRepo->getObjByID($id);
            $register->payment_reference_path   = $payment_reference_path;
            $register->status                   = 'confirm';
            $register->confirmed_by             = $confirm_by;
            $registerRepo->update($register);

            return redirect()->action('Backend\RegisterController@index');

        }
       
}
