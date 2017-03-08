<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Menu\Menu;
use App\Backend\Menu\MenuRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use DOMDocument;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class RegistrationConfirmUserEmailController extends Controller
{
    private $repo;

    public function __construct()
    {

    }

    public function edit(){
        if (Auth::guard('User')->check()) {
            $tempSettingArr      = DB::select("SELECT * FROM `core_settings` WHERE `code` = 'REG_CONFIRM_USER' LIMIT 1");
            $registrationconfirmuseremail = array();
            if (is_null($tempSettingArr) || count($tempSettingArr) == 0)
            {
                $registrationconfirmuseremail['description']   = "";
                return view('backend.registrationconfirmuseremail.registrationconfirmuseremail')->with('registrationconfirmuseremail', $registrationconfirmuseremail);
            }
            $registrationconfirmuseremail["description"] = $tempSettingArr[0]->description;
            return view('backend.registrationconfirmuseremail.registrationconfirmuseremail')->with('registrationconfirmuseremail', $registrationconfirmuseremail);
        }
        return redirect('/');
    }

    public function update(){

        $tempDescription    = (Input::has('description')) ? Input::get('description') : "";

        DB::statement("DELETE FROM `core_settings` WHERE `code` = 'REG_CONFIRM_USER' AND `type` = 'EMAIL'");

        DB::table('core_settings')->insert([
            ['code' => "REG_CONFIRM_USER", 'type' => 'EMAIL', 'value' => "0", 'description' => $tempDescription,]
        ]);

        return redirect()->action('Backend\RegistrationConfirmUserEmailController@edit');
    }
}
