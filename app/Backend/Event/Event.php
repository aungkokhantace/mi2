<?php
/**
 * Created by PhpStorm.
 * Author: Yu Wah 
 * Date: 1/16/2017
 * Time: 11:03 PM
 */

namespace App\Backend\Event;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'id',
        'name',
        'description',
        'status',
        'updated_at','created_at','deleted_at'

    ];
}
