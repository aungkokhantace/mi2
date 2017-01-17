<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Backend\Menudetail;

use Illuminate\Database\Eloquent\Model;

class Menudetail extends Model
{
    protected $table = 'menu_detail';

    protected $fillable = [
        'id',
        'menu_id',
        'page_url',
        'menu_order',
        'status',
        'menu_group',
        'menu_group_order',
        'name',
        'parent_id',
        'updated_at','created_at','deleted_at','updated_by','created_by','deleted_by'
        ,
    ];

    public function menu()
    {
        return $this->belongsTo('App\Backend\Menu\Menu','menu_id','id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Backend\Menu\Menu','parent_id','id');
    }
}
