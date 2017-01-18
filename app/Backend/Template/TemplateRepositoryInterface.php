<?php

/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/18/2017
 * Time: 10:00 AM
 */
namespace App\Backend\Template;

interface TemplateRepositoryInterface
{
    public function getObjs();
    public function create($paramObj);
    public function update($paramObj);
    public function getObjByID($id);
    public function delete($id);
    public function getArrays();
}