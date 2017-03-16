<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 3/15/2017
 * Time: 11:50 AM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\RegistrationCategoryEditRequest;
use App\Backend\Infrastructure\Forms\RegistrationCategoryEntryRequest;
use App\Backend\RegistrationCategory\RegistrationCategory;
use App\Backend\RegistrationCategory\RegistrationCategoryRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RegistrationCategoryController extends Controller
{
    private $repo;

    public function __construct(RegistrationCategoryRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                $registrationcategories      = $this->repo->getObjs();

                //change currency type to upper case for list view
                foreach($registrationcategories as $registrationcategory){
                    $registrationcategory->currency_type = strtoupper($registrationcategory->currency_type);
                }

                return view('backend.registrationcategory.index')->with('registrationcategories', $registrationcategories);
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/registrationcategory');
        }
    }

    public function create(){
        if (Auth::guard('User')->check()) {
            return view('backend.registrationcategory.registrationcategory');
        }
        return redirect('/');
    }

    public function store(RegistrationCategoryEntryRequest $request)
    {
        $request->validate();
        $name                       = (Input::has('name')) ? Input::get('name') : "";
        $currency_type              = (Input::has('currency_type')) ? Input::get('currency_type') : "mmk";
        $early_bird_fee             = (Input::has('early_bird_fee')) ? Input::get('early_bird_fee') : 0.0;
        $normal_fee                 = (Input::has('normal_fee')) ? Input::get('normal_fee') : 0.0;
        $on_site_fee                = (Input::has('on_site_fee')) ? Input::get('on_site_fee') : 0.0;

        $paramObj = new RegistrationCategory();

        $paramObj->name                 = $name;
        $paramObj->currency_type        = $currency_type;
        $paramObj->early_bird_fee       = $early_bird_fee;
        $paramObj->normal_fee           = $normal_fee;
        $paramObj->on_site_fee          = $on_site_fee;

        $result = $this->repo->create($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\RegistrationCategoryController@index')
                ->withMessage(FormatGenerator::message('Success', 'Registration Category created ...'));
        }
        else{
            return redirect()->action('Backend\RegistrationCategoryController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Registration Category did not create ...'));
        }
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $registrationcategory = $this->repo->getObjByID($id);
            return view('backend.registrationcategory.registrationcategory')->with('registrationcategory', $registrationcategory);
        }
        return redirect('/');
    }

    public function update(RegistrationCategoryEditRequest $request){
        $request->validate();
        $id = Input::get('id');
        $name                       = (Input::has('name')) ? Input::get('name') : "";
        $currency_type              = (Input::has('currency_type')) ? Input::get('currency_type') : "mmk";
        $early_bird_fee             = (Input::has('early_bird_fee')) ? Input::get('early_bird_fee') : 0.0;
        $normal_fee                 = (Input::has('normal_fee')) ? Input::get('normal_fee') : 0.0;
        $on_site_fee                = (Input::has('on_site_fee')) ? Input::get('on_site_fee') : 0.0;

        $paramObj = $this->repo->getObjByID($id);

        $paramObj->name                 = $name;
        $paramObj->currency_type        = $currency_type;
        $paramObj->early_bird_fee       = $early_bird_fee;
        $paramObj->normal_fee           = $normal_fee;
        $paramObj->on_site_fee          = $on_site_fee;

        $result = $this->repo->update($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\RegistrationCategoryController@index')
                ->withMessage(FormatGenerator::message('Success', 'Registration Category updated ...'));
        }
        else{
            return redirect()->action('Backend\RegistrationCategoryController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Registration Category did not update ...'));
        }
    }

    public function destroy(){

        $id         = Input::get('selected_checkboxes');
        $new_string = explode(',', $id);
        $delete_flag = true;
        foreach($new_string as $id){
            $this->repo->delete($id);
        }
        if($delete_flag){
            return redirect()->action('Backend\RegistrationCategoryController@index')
                ->withMessage(FormatGenerator::message('Success', 'Registration Category deleted ...'));
        }
        else{
            return redirect()->action('Backend\RegistrationCategoryController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Registration Category did not delete ...'));
        }
    }
}
