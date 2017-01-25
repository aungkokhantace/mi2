<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 10:55 AM
 */

namespace App\Http\Controllers\Backend;

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
           //$abstractforms      = $this->abstractformRepository->getAbstractforms();
            $abstractforms      = DB::select("SELECT * FROM event_abstract");           
            $countries = Utility::getSettingsByType("COUNTRY");
            return view('backend.abstractform.index')->with('abstractforms', $abstractforms)->with('countries', $countries);
        }
        return redirect('/login');
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {

                $abstractforms = $this->abstractformRepository->getObjByID($id);
                $countries = Utility::getSettingsByType("COUNTRY");
                return view('backend.abstractform.abstractform')->with('abstractforms', $abstractforms)->with('countries', $countries);
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
        $abstract_file_path     = Input::get('abstract_file_path');

        $abstractform = Abstractform::find($id);
        $abstractform->first_name            = $first_name;
        $abstractform->middle_name           = $middle_name;
        $abstractform->last_name             = $last_name;         
        $abstractform->email                 = $email;
        $abstractform->country               = $country;
        $abstractform->medical_specialities  = $medical_specialities;
        $abstractform->abstract_file_path    = $abstract_file_path;
        $abstractform->status                = "Pending";
        $abstractform->registered            = "0";

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
    
    public function download(Request $request)
    {
        //PDF file is stored under project/public/uploads/php7C6C.tmp.pdf
        $file= public_path(). "/uploads/phpB5A5.tmp.pdf";

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'downloadfile.pdf', $headers);
    }

}