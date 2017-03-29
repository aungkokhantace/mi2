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
use App\Core\Utility;

class ReportEventAbstractRepository implements ReportEventAbstractRepositoryInterface
{
    public function getEventAbstracts(){
        $event = DB::select("SELECT * FROM event_abstract");
        return $event;
    }

    public function getEventAbstractsByDate($from_date = null, $to_date = null, $paramArray = null){
        $query = "SELECT * FROM event_abstract WHERE events_id = 1 AND deleted_at IS NULL";

        if(isset($from_date) && $from_date != null){
            $tempFromDate = date("Y-m-d H:i:s", strtotime($from_date));

            $query .= " AND created_at >= '$tempFromDate' ";
        }
        if(isset($to_date) && $to_date != null){
            $tempToDate = date("Y-m-d", strtotime($to_date));
            $tempToDate .= " 23:00:00";

            $query .= " AND created_at <= '$tempToDate' ";
        }

        $result = DB::select($query);
        return $result;
    }

}