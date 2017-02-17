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

class RegistrationEmailController extends Controller
{
    private $repo;

    public function __construct()
    {

    }

    public function edit(){
        if (Auth::guard('User')->check()) {
            $tempSettingArr      = DB::select("SELECT * FROM `core_settings` WHERE `code` = 'TO_EMAIL_REGISTRATION' LIMIT 1");
            $registrationemail = array();
            if (is_null($tempSettingArr) || count($tempSettingArr) == 0)
            {

                $registrationemail['description']   = "";
                return view('backend.registrationemail.registrationemail')->with('registrationemail', $registrationemail);
            }
            $registrationemail["description"] = $tempSettingArr[0]->description;
            return view('backend.registrationemail.registrationemail')->with('registrationemail', $registrationemail);
        }
        return redirect('/');
    }

    public function update(){
        $tempDescription    = (Input::has('description')) ? Input::get('description') : "";

        DB::statement("DELETE FROM `core_settings` WHERE `code` = 'TO_EMAIL_REGISTRATION' AND `value` = 'TO_EMAIL_REGISTRATION'");

//        //start saving image
//        $dom = new DomDocument();
//
//        if(isset($tempDescription) && $tempDescription != ""){
//            $dom->loadHtml($tempDescription, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
//
//            $images = $dom->getElementsByTagName('img');
//
//            // foreach <img> in the submitted message
//            foreach($images as $img){
//                $src = $img->getAttribute('src');
//
//                // if the img source is 'data-url'
//                if(preg_match('/data:image/', $src)){
//
//                    // get the mimetype
//                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
//                    $mimetype = $groups['mime'];
//
//                    // Generating a random filename
//                    $filename = uniqid();
//                    $filepath = "/images/$filename.$mimetype";
//
//                    // @see http://image.intervention.io/api/
//                    $image = Image::make($src)
//                        // resize if required
//                        //->resize(300, 200)
//                        ->encode($mimetype, 100) 	// encode file to the specified mimetype
//                        ->save(public_path($filepath));
//
//                    $new_src = asset($filepath);
//                    $img->removeAttribute('src');
//                    $img->setAttribute('src', $new_src);
//
//                } // <!--endif
//            } // <!--endforeach
//        }
//
//        $description = $dom->saveHTML();
//        //End saving image

        DB::table('core_settings')->insert([
            ['code' => "TO_EMAIL_REGISTRATION", 'type' => 'EMAIL', 'value' => "TO_EMAIL_REGISTRATION", 'description' => $tempDescription,]
        ]);

        return redirect()->action('Backend\RegistrationEmailController@edit');
    }
}
