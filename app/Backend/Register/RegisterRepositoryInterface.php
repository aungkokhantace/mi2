<?php namespace App\Backend\Register;

/**
 * Created by PhpStorm.
 * Author: Yu Wah 
 * Date: 1/16/2017
 * Time: 11:03 PM
 */
interface RegisterRepositoryInterface
{
    public function getRegisters();
    public function getObjByID($id);
    public function create($paramObj);
    public function update($paramObj);
    public function delete_registers($id);

}