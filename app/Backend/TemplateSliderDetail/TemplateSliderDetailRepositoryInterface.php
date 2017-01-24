<?php

/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 1/9/2017
 * Time: 11:45 AM
 */
namespace App\Backend\TemplateSliderDetail;

interface TemplateSliderDetailRepositoryInterface
{
    public function getObjs();
    public function getObjsById($template_slider_id);
    public function create($paramObj);
    public function update($paramObj);
    public function getObjByID($id);
    public function delete($id);
    public function getArrays();
}