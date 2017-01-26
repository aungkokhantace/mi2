<?php
namespace App\Http\Controllers\Frontend;

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
use App\Backend\Infrastructure\Forms\EventEditRequest;
use App\Core\Utility;

class RegisterController extends Controller
{   

    public function __construct()
    {        
    }

  // public function index(Request $request)
  //   {
  //       if (Auth::guard('User')->check()) {

  //           $countries = Utility::getSettingsByType("COUNTRY");
  //           return view('frontend.register.index')->with('countries', $countries);
  //         }
  //       return redirect('frontend/login');
  //   }

     public function create(){
            $countries = Utility::getSettingsByType("COUNTRY");
            return view('frontend.register.register_frontend')->with('countries', $countries);   
    }

    public function store(RegisterEntryRequest $request)
        {   $registerRepo = new RegisterRepository();
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
            $register->status = "pending";


            $result = $registerRepo->create($register);
            alert()->success('Registration successfully created. ')->persistent('OK');
            return redirect()->action('Frontend\RegisterController@create');
        }

   

}