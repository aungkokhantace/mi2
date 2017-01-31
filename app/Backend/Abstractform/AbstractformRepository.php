<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 3:56 PM
 */

namespace App\Backend\Abstractform;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Core\Utility;
use App\Core\ReturnMessage;

class AbstractformRepository implements AbstractformRepositoryInterface
{
	 public function create($abstractform)
    {
        $returnedObj = array();
        $returnedObj['aceplusStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $tempObj = Utility::addCreatedBy($abstractform);
            $tempObj->save();

            $returnedObj['aceplusStatusCode'] = ReturnMessage::OK;
            return $returnedObj;
        }
        catch(\Exception $e){
            $returnedObj['aceplusStatusMessage'] = $e->getMessage();
            return $returnedObj;
        }
        
    }

    public function getAbstractforms()
    {
        $abstractforms = Abstractform::whereNull('deleted_at')->get();
        return $abstractforms;
    }

     public function update($paramObj)
    {
        $tempObj = Utility::addUpdatedBy($paramObj);
        $tempObj->save();
    }

    public function getObjByID($id){
        $abstractform = Abstractform::find($id);
        return $abstractform;
    }

   public function delete($id){
        $abstractform = DB::table('event_abstract')->where('id',$id)->update(['deleted_at'=> date('Y-m-d H:m:i')]);
        return $abstractform;
    }

}