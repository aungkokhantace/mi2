<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/18/2017
 * Time: 9:50 AM
 */
namespace App\Backend\Template;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $table = 'templates';

    protected $fillable = [
        'id',
        'name',
        'description',
        'has_slider',
        'has_sidebar',
        'active',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
        ,
    ];

    public function templatesidebarmenu()
    {
        return $this->hasMany('App\Backend\TemplateSidebarMenu\TemplateSidebarMenu');
    }

    public function slider()
    {
        return $this->hasMany('App\Backend\TemplateSlider\TemplateSlider');
    }

    public function page()
    {
        return $this->hasMany('App\Backend\Page\Page');
    }
}
