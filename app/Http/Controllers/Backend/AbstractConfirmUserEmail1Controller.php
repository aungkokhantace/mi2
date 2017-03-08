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

class AbstractConfirmUserEmail1Controller extends Controller
{
    private $repo;

    public function __construct()
    {

    }

    public function edit(){
        if (Auth::guard('User')->check()) {
            $tempSettingArr      = DB::select("SELECT * FROM `core_settings` WHERE `code` = 'ABS_CONFIRM_USER_1' LIMIT 1");
            $abstractconfirmuseremail1 = array();
            if (is_null($tempSettingArr) || count($tempSettingArr) == 0)
            {
                $abstractconfirmuseremail1['description']   = "";
                return view('backend.abstractconfirmuseremail1.abstractconfirmuseremail1')->with('abstractconfirmuseremail1', $abstractconfirmuseremail1);
            }
            $abstractconfirmuseremail1["description"] = $tempSettingArr[0]->description;
            return view('backend.abstractconfirmuseremail1.abstractconfirmuseremail1')->with('abstractconfirmuseremail1', $abstractconfirmuseremail1);
        }
        return redirect('/');
    }

    public function update(){

        $tempDescription    = (Input::has('description')) ? Input::get('description') : "";

        DB::statement("DELETE FROM `core_settings` WHERE `code` = 'ABS_CONFIRM_USER_1' AND `type` = 'EMAIL'");

        DB::table('core_settings')->insert([
            ['code' => "ABS_CONFIRM_USER_1", 'type' => 'EMAIL', 'value' => "0", 'description' => $tempDescription,]
        ]);

        return redirect()->action('Backend\AbstractConfirmUserEmail1Controller@edit');
    }
}
