<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Backend\RegistrationCategory;

use Illuminate\Database\Eloquent\Model;

class RegistrationCategory extends Model
{
    protected $table = 'registration_categories';

    protected $fillable = [
        'id',
        'name',
        'currency_type',
        'early_bird_fee',
        'normal_fee',
        'on_site_fee',
        'created_by','updated_by','deleted_by','created_at','updated_at','deleted_at'
        ,
    ];

    public function register()
    {
        return $this->hasMany('App\Backend\Register\Register');
    }
//
//    public function abstractform()
//    {
//        return $this->hasMany('App\Backend\Abstractform\Abstractform');
//    }
}
