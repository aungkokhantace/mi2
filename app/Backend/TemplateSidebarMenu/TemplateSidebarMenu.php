<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/18/2017
 * Time: 9:50 AM
 */
namespace App\Backend\TemplateSidebarMenu;

use Illuminate\Database\Eloquent\Model;

class TemplateSidebarMenu extends Model
{
    protected $table = 'template_sidebar_menu';

    protected $fillable = [
        'id',
        'name',
        'description',
        'template_id',
        'page_id',
        'menu_order',
        'menu_parent_id',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];

    public function template()
    {
        return $this->belongsTo('App\Backend\Template\Template','template_id','id');
    }

    public function page()
    {
        return $this->belongsTo('App\Backend\Page\Page','page_id','id');
    }

    public function menu()
    {
        return $this->belongsTo('App\Backend\Menu\Menu','menu_parent_id','id');
    }
}
