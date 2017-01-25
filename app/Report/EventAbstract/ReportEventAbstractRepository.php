<?php
/**
 * Created by PhpStorm.
 * User: william
 * Author: william
 * Date: 1/24/2017
 * Time: 4:42 PM
 */


namespace App\Report\EventAbstract;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Backend\Event\Event;
use App\Core\Utility;

class ReportEventAbstractRepository implements ReportEventAbstractRepositoryInterface
{
    public function getEventAbstracts(){
        $event = DB::select("SELECT * FROM event_registrations");
        return $event;
    }

}