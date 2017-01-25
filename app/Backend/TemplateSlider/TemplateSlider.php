<?php

namespace App\Backend\TemplateSlider;

use Illuminate\Database\Eloquent\Model;

class TemplateSlider extends Model
{
    protected $table = 'template_slider';

    protected $fillable = [
        'id',
        'name',
        'description',
        'template_id',
        'active',
        'created_at','updated_at','deleted_at','created_by','updated_by','deleted_by'
    ];

    public function template()
    {
        return $this->belongsTo('App\Backend\Template\Template','template_id','id');
    }
}
