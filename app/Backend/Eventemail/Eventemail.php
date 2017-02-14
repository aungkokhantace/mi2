<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Backend\EventEmail;

use Illuminate\Database\Eloquent\Model;

class Eventemail extends Model
{
    protected $table = 'event_emails';

    protected $fillable = [
        'id',
        'email',
        'description',
        'type',
        'updated_at','created_at','deleted_at','updated_by','created_by','deleted_by'
    ];
}
