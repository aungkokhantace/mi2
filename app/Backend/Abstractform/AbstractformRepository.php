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

class AbstractformRepository implements AbstractformRepositoryInterface
{
	 public function create($abstractform)
    {
        $tempObj = Utility::addCreatedBy($abstractform);
        $tempObj->save();
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