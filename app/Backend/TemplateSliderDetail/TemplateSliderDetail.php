<?php

namespace App\Backend\TemplateSliderDetail;

use Illuminate\Database\Eloquent\Model;

class TemplateSliderDetail extends Model
{
    protected $table = 'template_slider_detail';

    protected $fillable = [
        'id',
        'image_name',
        'image_url',
        'description',
        'template_slider_id'
    ];
}
