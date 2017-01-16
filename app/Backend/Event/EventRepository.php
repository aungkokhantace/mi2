<?php
/**
 * Created by PhpStorm.
 * Author: Yu Wah 
 * Date: 1/16/2017
 * Time: 11:03 PM
 */
namespace App\Backend\Event;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Backend\Event\Event;
use App\Backend\Permission\PermissionRepository;
use App\Core\Utility;

class EventRepository implements EventRepositoryInterface
{
    public function create($event)
    {
        $tempObj = Utility::addCreatedBy($event);
        $tempObj->save();
    }

    public function update($event)
    {
        $tempObj = Utility::addUpdatedBy($event);
        $tempObj->save();
    }

    public function getEvents()
    {
        $events = Event::whereNull('deleted_at')->get();
        return $events;
    }

    public function delete_events($id){
            DB::table('events')->where('id',$id)->update(['deleted_at'=> date('Y-m-d H:m:i')]);
            $event = Event::find($id);
            $event = Utility::addDeletedBy($event);
            $event->deleted_at = date('Y-m-d H:m:i');
            $event->save();
    }

    public function getObjByID($id){
        $event = Event::find($id);
        return $event;
    }

}