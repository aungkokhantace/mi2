<?php
/**
 * Created by PhpStorm.
 * Author: Yu Wah 
 * Date: 1/16/2017
 * Time: 11:03 PM
 */

namespace App\Backend\Register;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'event_registrations';

    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'title',
        'email',
        'country',
        'where_work',
        'medical_speciality_id',
        'medical_speciality_other',
        'phone_no',
        'registration_category',
        'payment_type',
        'status',
        'events_id',
        'confirmed_by',
        'payment_reference_path',
        'updated_at','created_at','deleted_at'
    ];

    public function medical_speciality()
    {
        return $this->belongsTo('App\Backend\MedicalSpeciality\MedicalSpeciality','medical_speciality_id','id');
    }

    public function registrationcategory()
    {
        return $this->belongsTo('App\Backend\RegistrationCategory\RegistrationCategory','registration_category','id');
    }
}
