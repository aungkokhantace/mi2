<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 10:55 AM
 */

namespace App\Http\Controllers\Backend;

use App\Backend\MedicalSpeciality\MedicalSpecialityRepository;
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
           $abstractforms      = $this->abstractformRepository->getAbstractforms();
//            $abstractforms      = DB::select("SELECT * FROM event_abstract WHERE deleted_at IS NULL");
            $countries = Utility::getSettingsByType("COUNTRY");

            foreach ($abstractforms as $absCountry)
            {
                $tempCountryId = $absCountry->country;
                $countryName = $countries[$tempCountryId];
                $absCountry->country = $countryName;
            }

            foreach($abstractforms as $absStatus){
                $absStatus->status = strtoupper($absStatus->status);
            }

            foreach($abstractforms as $absSpeciality){
                if($absSpeciality->medical_speciality_id == 0){
                    //if user chose "other" in medical speciality, medical_speciality_id is 0 and medical_speciality_other is shown instead!!
                    $absSpeciality->medical_speciality_name = $absSpeciality->medical_speciality_other;
                }
                else{
                    //if medical_speciality is not 0, show medical_speciality_name
                    $absSpeciality->medical_speciality_name = $absSpeciality->medical_speciality->name;
                }
            }

            return view('backend.abstractform.index')->with('abstractforms', $abstractforms)->with('countries', $countries);
        }
        return redirect('/login');
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {

                $abstractforms = $this->abstractformRepository->getObjByID($id);
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

                return view('backend.abstractform.abstractform')->with('abstractforms', $abstractforms)->with('countries', $countries)->with('specialitiesArr', $specialitiesArr);
        }
        return redirect('/backend/login');
    }

    public function update(AbstractformEditRequest $request){
        $id                     = Input::get('id');
        $first_name             = Input::get('first_name');
        $middle_name            = Input::get('middle_name');
        $last_name              = Input::get('last_name');
        $email                  = Input::get('email');
        $country                = Input::get('country');
        $medical_specialities   = Input::get('medical_specialities');
        $confirmed_date         = date("Y-m-d");
        $confirmed_by             = Auth::guard('User')->user()->id;

        $abstractform = Abstractform::find($id);
        $abstractform->first_name            = $first_name;
        $abstractform->middle_name           = $middle_name;
        $abstractform->last_name             = $last_name;         
        $abstractform->email                 = $email;
        $abstractform->country               = $country;
        $abstractform->medical_specialities  = $medical_specialities;
        $abstractform->status                = "confirm";
        $abstractform->registered            = "0";
        $abstractform->confirmed_date        = $confirmed_date;
        $abstractform->confirmed_by           = $confirmed_by;

        $this->abstractformRepository->update($abstractform);
        return redirect()->action('Backend\AbstractformController@index');
    }

    public function destroy(){
        $id         = Input::get('selected_checkboxes');
        $new_string = explode(',', $id);
        foreach($new_string as $id){
            $this->abstractformRepository->delete($id);
        }
        return redirect()->action('Backend\AbstractformController@index');
    }   
    
    

}
