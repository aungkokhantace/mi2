<?php namespace App\Core;
/**
 * Created by PhpStorm.
 * Author: Wai Yan Aung
 * Date: 7/12/2016
 * Time: 3:27 PM
 */

use App\Core\Config\ConfigRepository;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\Http\Requests;
use App\Session;
use App\Core\User\UserRepository;
use App\Core\SyncsTable\SyncsTable;
use InterventionImage;
use PDF;

class Utility
{

    public static function addCreatedBy($newObj)
    {
        $sessionObj = session('user');
        if(isset($sessionObj)){
            $userSession = session('user');
            $loginUserId = $userSession['id'];
            $newObj->updated_by = $loginUserId;
            $newObj->created_by = $loginUserId;
        }
        Utility::updateSyncsTable($newObj);
        return $newObj;
    }

    public static function addUpdatedBy($newObj)
    {
        $sessionObj = session('user');
        if(isset($sessionObj)){
            $userSession = session('user');
            $loginUserId = $userSession['id'];
            $newObj->updated_by = $loginUserId;
        }
        Utility::updateSyncsTable($newObj);
        return $newObj;
    }

    public static function addDeletedBy($newObj)
    {
        $sessionObj = session('user');
        if(isset($sessionObj)){
            $userSession = session('user');
            $loginUserId = $userSession['id'];
            $newObj->deleted_by = $loginUserId;
        }
        Utility::updateSyncsTable($newObj);
        return $newObj;
    }

    public static function updateSyncsTable($newObj)
    {
        $table_name = $newObj->getTable();
        $tempSyncTable = new SyncsTable();
        $syncTableName = $tempSyncTable->getTable();

        $syncTableObj = DB::table($syncTableName)
            ->select('*')
            ->where('table_name' , '=' , $table_name)
            ->first();

        if(isset($syncTableObj) && count($syncTableObj)>0) {
            $id = $syncTableObj->id;
            $version = $syncTableObj->version + 1;
            $syncTable = SyncsTable::find($id);

            $sessionObj = session('user');
            if (isset($sessionObj)) {
                $userSession = session('user');
                $loginUserId = $userSession['id'];
                $syncTable->updated_by = $loginUserId;
            }

            $syncTable->version = $version++;
            $syncTable->save();

        }
    }



    public static function getCurrentUserID(){
        $id = Auth::guard('User')->user()->id;
        return $id;
    }


    public static function getSettingsByType($type)
    {
        if($type == "COUNTRY"){
            $tempArrays = DB::select("SELECT * FROM core_settings WHERE type = '$type' ORDER BY 'value'");
            $result = array();
            if (isset($tempArrays) && count($tempArrays) > 0) {
                foreach ($tempArrays as $val) {
                    $key = $val->value;
                    $value = $val->description;
                    $result[$key] = $value;
                }
            }
        }
        else{
            $tempArrays = DB::select("SELECT * FROM core_settings WHERE type = '$type' ORDER BY 'value'");
            $result = array();
            if (isset($tempArrays) && count($tempArrays) > 0) {
                foreach ($tempArrays as $val) {
                    $key = $val->value;
                    $value = $val->code;
                    $result[$key] = $value;
                }
            }
        }
        return $result;
    }

    //start functions for image upload
    public static function getImage($photo){
        $photo_name = $photo->getClientOriginalName();
        return $photo_name;
    }

    public static function getImageExt($photo){
        $photo_ext = $photo->getClientOriginalExtension();

        return $photo_ext;
    }

    public static function resizeImage($photo,$photo_name,$path){

        if(! file_exists($path))
        {
            mkdir($path, 0777, true);
        }

        $photo->move($path,$photo_name);

        $rWidth     = 1.0;
        $rHeight    = 1.0;

        $imgData    = getimagesize($path . $photo_name);
        $width      = $imgData[0];
        $imgWidth   = $width * $rWidth;
        $height     = $imgData[1];
        $imgHeight  = $height * $rHeight;



        $image      = InterventionImage::make(sprintf($path . '/%s', $photo_name))
            ->resize($imgWidth,$imgHeight)->save();

        return $image;
    }
//    end functions for image upload

// Use Pdf Export

    public static function exportPDF($html)
    {
        // dd($html);
        PDF::SetTitle('exportPDF');
        PDF::AddPage();
        PDF::writeHTML($html, true, false, false, false, '');

        /* PDF::writeHTML($html, $ln = true, $fill = false, $reseth = false, $cell = false, $align = '');

        Parameter Definitions
         $html     (string) text to display
         $ln     (boolean) if true add a new line after text (default = true)
         $fill     (boolean) Indicates if the background must be painted (true) or transparent (false).
         $reseth (boolean) if true reset the last cell height (default false).
         $cell     (boolean) if true add the current left (or right for RTL) padding to each Write (default false).
         $align     (string) Allows to center or align the text. Possible values are:
                        L  : left align
                        C  : center
                        R  : right align
                        '' : empty string : left for LTR or right for RTL */

        PDF::Output('exportPDF.pdf');
        exit();
    }
}