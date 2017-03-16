<?php

/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 3/15/2017
 * Time: 11:48 AM
 */
namespace App\Backend\RegistrationCategory;

interface RegistrationCategoryRepositoryInterface
{
    public function getObjs();
    public function create($paramObj);
    public function update($paramObj);
    public function getObjByID($id);
    public function delete($id);
    public function getArrays();
}