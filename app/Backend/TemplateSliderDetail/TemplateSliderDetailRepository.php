<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/9/2017
 * Time: 11:45 AM
 */
namespace App\Backend\TemplateSliderDetail;

use App\Core\ReturnMessage;
use App\Core\Utility;

class TemplateSliderDetailRepository implements TemplateSliderDetailRepositoryInterface
{
    public function getObjs()
    {
        $objs = TemplateSliderDetail::get();
        return $objs;
    }

    public function getObjsByID($template_slider_id)
    {
        $objs = TemplateSliderDetail::where('template_slider_id','=',$template_slider_id)->get();
        return $objs;
    }

    public function getArrays()
    {
        $tbName = (new TemplateSliderDetail())->getTable();
        $arr = DB::select("SELECT * FROM $tbName");
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
            $tempObj = TemplateSliderDetail::find($id);
//            $tempObj = Utility::addDeletedBy($tempObj);
//            $tempObj->deleted_at = date('Y-m-d H:m:i');
            $tempObj->save();
    }

    public function getObjByID($id){
        $slider = TemplateSliderDetail::find($id);
        return $slider;
    }
}