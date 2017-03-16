<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/9/2017
 * Time: 11:45 AM
 */
namespace App\Backend\TemplateSlider;

use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Support\Facades\DB;

class TemplateSliderRepository implements TemplateSliderRepositoryInterface
{
    public function getObjs()
    {
        $objs = TemplateSlider::whereNull('deleted_at')->get();
        return $objs;
    }

    public function getArrays()
    {
        $tbName = (new TemplateSlider())->getTable();
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
            $tempObj = TemplateSlider::find($id);
            $tempObj = Utility::addDeletedBy($tempObj);
            $tempObj->deleted_at = date('Y-m-d H:m:i');
            $tempObj->save();
    }

    public function getObjByID($id){
        $slider = TemplateSlider::find($id);
        return $slider;
    }

    public function getObjByTemplateID($template_id){
        $slider = TemplateSlider::whereNull('deleted_at')->where('template_id','=',$template_id)->first();
        return $slider;
    }
}