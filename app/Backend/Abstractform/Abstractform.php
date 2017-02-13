<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 3:56 PM
 */

namespace App\Backend\Abstractform;

use Illuminate\Database\Eloquent\Model;

class Abstractform extends Model
{
    protected $table = 'event_abstract';

    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'country',
        'medical_speciality_id',
        'medical_speciality_other',
        'abstract_file_path',
        'status',
        'registered',
        'updated_at','created_at','deleted_at'

    ];

    public function medical_speciality()
    {
        return $this->belongsTo('App\Backend\MedicalSpeciality\MedicalSpeciality','medical_speciality_id','id');
    }
    
}
