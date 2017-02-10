<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\MedicalSpecialityEditRequest;
use App\Backend\Infrastructure\Forms\MedicalSpecialityEntryRequest;
use App\Backend\MedicalSpeciality\MedicalSpeciality;
use App\Backend\MedicalSpeciality\MedicalSpecialityRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MedicalSpecialityController extends Controller
{
    private $repo;

    public function __construct(MedicalSpecialityRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                $medicalspecialities      = $this->repo->getObjs();
                return view('backend.medicalspeciality.index')->with('medicalspecialities', $medicalspecialities);
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/medicalspecialities');
        }
    }

    public function create(){
        if (Auth::guard('User')->check()) {
            return view('backend.medicalspeciality.medicalspeciality');
        }
        return redirect('/');
    }

    public function store(MedicalSpecialityEntryRequest $request)
    {
        $request->validate();
        $name                       = (Input::has('name')) ? Input::get('name') : "";
        $option_group_name          = (Input::has('option_group_name')) ? Input::get('option_group_name') : "";
        $description                = (Input::has('description')) ? Input::get('description') : "";

        $paramObj = new MedicalSpeciality();
        $paramObj->name                 = $name;
        $paramObj->option_group_name    = $option_group_name;
        $paramObj->description          = $description;

        $result = $this->repo->create($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\MedicalSpecialityController@index')
                ->withMessage(FormatGenerator::message('Success', 'Medical Speciality created ...'));
        }
        else{
            return redirect()->action('Backend\MedicalSpecialityController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Medical Speciality did not create ...'));
        }
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $medicalspeciality = $this->repo->getObjByID($id);
            return view('backend.medicalspeciality.medicalspeciality')->with('medicalspeciality', $medicalspeciality);
        }
        return redirect('/');
    }

    public function update(MedicalSpecialityEditRequest $request){
        $request->validate();
        $id = Input::get('id');
        $name                       = (Input::has('name')) ? Input::get('name') : "";
        $option_group_name          = (Input::has('option_group_name')) ? Input::get('option_group_name') : "";
        $description                = (Input::has('description')) ? Input::get('description') : "";

        $paramObj = MedicalSpeciality::find($id);
        $paramObj->name                 = $name;
        $paramObj->option_group_name    = $option_group_name;
        $paramObj->description          = $description;

        $result = $this->repo->update($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\MedicalSpecialityController@index')
                ->withMessage(FormatGenerator::message('Success', 'Medical Speciality updated ...'));
        }
        else{
            return redirect()->action('Backend\MedicalSpecialityController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Medical Speciality did not update ...'));
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
            return redirect()->action('Backend\MedicalSpecialityController@index')
                ->withMessage(FormatGenerator::message('Success', 'Medical Speciality deleted ...'));
        }
        else{
            return redirect()->action('Backend\MedicalSpecialityController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Medical Speciality did not delete ...'));
        }
    }
}
