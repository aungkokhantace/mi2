<?php
/**
 * Created by PhpStorm.
 * Author: Yu Wah 
 * Date: 1/16/2017
 * Time: 11:03 PM
 */
namespace App\Backend\Register;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Backend\Register\register;
use App\Backend\Permission\PermissionRepository;
use App\Core\Utility;

class RegisterRepository implements RegisterRepositoryInterface
{
    public function create($register)
    {
        $tempObj = Utility::addCreatedBy($register);
        $tempObj->save();
    }

    public function getRegisters()
    {
        $register = Register::whereNull('deleted_at')->get();
        return $register;
    }

    public function getObjByID($id){
        $register = Register::find($id);
        return $register;
    }

    public function update($register)
    {
        $tempObj = Utility::addUpdatedBy($register);
        $tempObj->save();
    }

    public function delete_registers($id){
        DB::table('event_registrations')->where('id',$id)->update(['deleted_at'=> date('Y-m-d H:m:i')]);
        $register = Register::find($id);
        $register = Utility::addDeletedBy($register);
        $register->deleted_at = date('Y-m-d H:m:i');
        $register->save();
    }

}