<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 10:55 AM
 */

namespace App\Http\Controllers\Frontend;

use App\Backend\File\FileUploadDownloadRepository;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Backend\Abstractform\AbstractformRepositoryInterface;
use App\Backend\Abstractform\Abstractform;
use App\Backend\File\FileUploadDownloadRepositoryInterface;
use App\Backend\File\FileUploadDownload;
use App\Backend\Infrastructure\Forms\AbstractformEntryRequest;
use App\Backend\Infrastructure\Forms\AbstractformEditRequest;
use App\Core\Permission\PermissionRepositoryInterface;
use App\Core\Permission\Permission;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Core\Utility;
use Mail;

class AbstractformController extends Controller
{

    private $abstractformRepository;

    public function __construct(AbstractformRepositoryInterface $abstractformRepository)
    {
        $this->abstractformRepository = $abstractformRepository;
    }

    public function create(Request $request)
    {
            
            $countries = Utility::getSettingsByType("COUNTRY");
            // dd($countries);
            return view('frontend.abstractform.abstractform')->with('countries', $countries);
    }

    public function store(AbstractformEntryRequest $request)
    {
        $request->validate();
        $filetable = (new FileUploadDownload())->getTable();
        $abstracttable = (new Abstractform())->getTable();
        $abstract_file_path     = Input::file('abstract_file_path');
          //start file section
        $extension = $abstract_file_path->getClientOriginalExtension();

        // SET UPLOAD PATH
        $destinationPath = 'uploads';
        // GET THE FILE EXTENSION
        $extension = $abstract_file_path->getClientOriginalExtension();
        // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = $abstract_file_path->getFilename() . '.' . $extension;
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $abstract_file_path->move($destinationPath, $fileName);

        $paramObj = new FileUploadDownload();
        $paramObj->mime = $abstract_file_path->getClientMimeType();
        $paramObj->original_filename = $abstract_file_path->getClientOriginalName();
        $paramObj->filename = $abstract_file_path->getFilename().'.'.$extension;

        $filerepo = new FileUploadDownloadRepository();
        $result = $filerepo->create($paramObj);
        //end file section

        $first_name             = Input::get('first_name');
        $middle_name            = Input::get('middle_name');
        $last_name              = Input::get('last_name');
        $email                  = Input::get('email');
        $country                = Input::get('country');
        $medical_specialities   = Input::get('medical_specialities');


        $abstractform = new Abstractform();
        $abstractform->first_name            = $first_name;
        $abstractform->middle_name           = $middle_name;
        $abstractform->last_name             = $last_name;
        $abstractform->email                 = $email;
        $abstractform->country               = $country;
        $abstractform->medical_specialities  = $medical_specialities;
        $abstractform->abstract_file_path    =  "uploads/".$abstract_file_path->getFilename() . '.' . $extension;
        $abstractform->status                = "pending";
        $abstractform->registered            = "0";

        $result = $this->abstractformRepository->create($abstractform);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            $attach = $abstractform->abstract_file_path;
            Mail::send('frontend.abstractform.email', compact('email'), function($message) use($email,$attach) {
                $message->to($email)->subject('Registration Reply');
                //Attach file
                $message->attach($attach);

            });
            return redirect()->action('Frontend\AbstractformController@create')
                ->withMessage(FormatGenerator::message('Success', 'File added ...'));
        }
        else{
            return redirect()->action('Frontend\AbstractformController@create')
                ->withMessage(FormatGenerator::message('Fail', 'File did not add ...'));
        }
    }

   

}
