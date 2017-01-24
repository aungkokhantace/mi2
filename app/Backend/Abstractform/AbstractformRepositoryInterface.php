<?php
/**
 * Created by PhpStorm.
 * Author: Mi Tin Zar Kyaw
 * Date: 1/16/2017
 * Time: 3:56 PM
 */

namespace App\Backend\Abstractform;


interface AbstractformRepositoryInterface
{
    public function getAbstractforms();
    public function create($paramObj);
    public function update($paramObj);
    public function getObjByID($id);
    public function delete($id); 
}