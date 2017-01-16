<?php namespace App\Backend\Event;

/**
 * Created by PhpStorm.
 * Author: Yu Wah 
 * Date: 1/16/2017
 * Time: 11:03 PM
 */
interface EventRepositoryInterface
{
    public function getEvents();
    public function getObjByID($id);
    public function create($paramObj);
    public function update($paramObj);
    public function delete_events($id);

}