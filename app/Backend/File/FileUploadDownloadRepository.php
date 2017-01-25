<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/9/2017
 * Time: 11:45 AM
 */
namespace App\Backend\File;

use App\Core\ReturnMessage;
use App\Core\Utility;

class FileUploadDownloadRepository implements FileUploadDownloadRepositoryInterface
{
    public function getObjs()
    {
        $objs = Post::whereNull('deleted_at')->get();
        return $objs;
    }

    public function getArrays()
    {
        $tbName = (new Allergy())->getTable();
        $arr = DB::select("SELECT * FROM $tbName WHERE deleted_at IS NULL");
        return $arr;
    }

    public function create($paramObj)
    {
        $returnedObj = array();
        $returnedObj['aceplusStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;

        try {
            $tempObj = Utility::addCreatedBy($paramObj);
            $tempObj->save();

            $returnedObj['aceplusStatusCode'] = ReturnMessage::OK;
            return $returnedObj;
        }
        catch(\Exception $e){
            $returnedObj['aceplusStatusMessage'] = $e->getMessage();
            return $returnedObj;
        }
    }

    public function update($paramObj)
    {
        $returnedObj = array();
        $returnedObj['aceplusStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;

        try {
            $tempObj = Utility::addUpdatedBy($paramObj);
            $tempObj->save();

            $returnedObj['aceplusStatusCode'] = ReturnMessage::OK;
            return $returnedObj;
        }
        catch(\Exception $e){

            $returnedObj['aceplusStatusMessage'] = $e->getMessage();
            return $returnedObj;
        }
    }

    public function delete($id)
    {
        $fileuploaddownload = DB::table('file')->where('id',$id)->update(['deleted_at'=> date('Y-m-d H:m:i')]);
        return $fileuploaddownload;
    }

    public function getObjByID($id){
        $fileuploaddownload = FileUploadDownload::find($id);
        return $fileuploaddownload;
    }
}