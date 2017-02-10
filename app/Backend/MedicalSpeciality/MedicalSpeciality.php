<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Backend\MedicalSpeciality;

use Illuminate\Database\Eloquent\Model;

class MedicalSpeciality extends Model
{
    protected $table = 'medical_specialities';

    protected $fillable = [
        'id',
        'name',
        'option_group_name',
        'description',
        'created_by','updated_by','deleted_by','created_at','updated_at','deleted_at'
        ,
    ];

    public function register()
    {
        return $this->hasMany('App\Backend\Register\Register');
    }
}
