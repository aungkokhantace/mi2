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
//            $tempArrays = DB::select("SELECT * FROM core_settings WHERE type = '$type' ORDER BY 'value'");
            $tempArrays = DB::select("SELECT * FROM core_settings WHERE type = '$type' ORDER BY 'description' ASC"); //to sort by country names alphabetically
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

    public static function getCountryNameByValue($value){
        $temp = DB::select("SELECT description FROM core_settings WHERE value = '$value'  LIMIT 1");
        $countryName = $temp[0]->description;
        return $countryName;
    }

/*    public static function getEmailHeader(){
//        $imgpath = url('images/LetterHead.jpg');
//        $imgpath = base_path().'/public/images/LetterHead.jpg';
//        dd('imgpath',$imgpath);
//        $headerImage = '<img style="width:100%;height:100%;" src="<? php echo $message->embed('.$imgpath.');
//<!--" alt="Letter Head"><br><br>';-->
        $date        = date("d-m-Y").'<br><br>';
//        $to          = 'To : '.'<br><br>';

//        $title       = '<b>ACKNOWLEDGEMENT OF RECEIPT OF MMK ............ AS THE REGISTRATION FEE FOR .................................</b><br><br>';
//        $content     = 'This serves to confirm that we have received your payment of MMK ................. as the registration fee to attend the MIMC 2017 Conference.<br><br><br>
//                        You have now been registered as a delegate for the Conference.<br><br><br><br><br><br>';

//        $template      = $headerImage.'<br>'.$date;
        $template      = $date;
        return $template;
    } */

    public static function getEventTitle(){
        $eventTitle       = '<b>MIMC 2017 Conference – 29th September to 1st October, 2017</b>';
        return $eventTitle;
    }

    public static function getSincerely(){
        $sincerely   = 'Yours sincerely';
        return $sincerely;
    }

    public static function getPresidentInfo(){
        $presidentInfo = 'Professor Myo Lwin Nyein<br><br>
                        President<br><br>
                        Organizing Committee, MIMC 2017';
        return $presidentInfo;
    }

    public static function getEmailFooterBeforeLogo(){
        $footerBeforeLogo = '<table width="100%" border="0">
                            <tr>
                                <td width="40%" rowspan="5">';
        return $footerBeforeLogo;
    }

    public static function getEmailFooterAfterLogo(){
        $footerAfterLogo = '</td>
                                <td width="60%" style="padding-left: 10px;"><b>MIMC 2017 Conference Secretariat:</b></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">Tel: +9595173548, +9595192153, +9595049616</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">Email: <a href="treasurer@internalmedicinesocietymyanmar.com">treasurer@internalmedicinesocietymyanmar.com,</a></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;"><a href="secretary@internalmedicinesocietymyanmar.com">secretary@internalmedicinesocietymyanmar.com</a></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;"><a href="http://www.internalmedicinesocietymyanmar.com">Website: http://www.internalmedicinesocietymyanmar.com</a></td>
                            </tr>
                        </table><br>';
        return $footerAfterLogo;
    }

   /* public static function getEmailFooter(){
        /*$signature   = 'Yours sincerely<br><br>'.
            '<img style="width:20%;height:20%;" src="/images/Sign.jpg" alt="Signature"><br><br>'
            .'Professor Myo Lwin Nyein<br><br>
                        President<br><br>
                        Organizing Committee, MIMC 2017<br><br><br><br><br><br><br>';   */

        /*$footerLogos      = '<table width="100%" border="0">
                            <tr>
                                <td width="40%" rowspan="5"><img style="width:100%;height:25%;" src="/images/FooterLogos.jpg" alt="FooterLogos"></td>
                                <td width="60%" style="padding-left: 10px;"><b>MIMC 2017 Conference Secretariat:</b></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">Tel: +9595173548, +9595192153, +9595049616</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">Email: <a href="treasurer@internalmedicinesocietymyanmar.com">treasurer@internalmedicinesocietymyanmar.com,</a></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;"><a href="secretary@internalmedicinesocietymyanmar.com">secretary@internalmedicinesocietymyanmar.com</a></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;"><a href="http://www.internalmedicinesocietymyanmar.com">Website: http://www.internalmedicinesocietymyanmar.com</a></td>
                            </tr>
                        </table>';

        $footer = $signature.$footerLogos;
        return $footer;
    } */

    public static function getEarlyBirdDate(){
        $temp = DB::select("SELECT value FROM core_configs WHERE code = 'SETTING_EARLY_BIRD' AND type = 'SETTING' LIMIT 1");
        $early_bird_date = $temp[0]->value;
        return $early_bird_date;
    }
}