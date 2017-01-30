<?php
/**
 * Created by PhpStorm.
 * User: william
 * Author: william
 * Date: 1/24/2017
 * Time: 2:32 PM
 */

namespace App\Report\EventRegistration;

use Illuminate\Support\Facades\DB;
use App\Core\Utility;

class ReportEventRegistrationRepository implements ReportEventRegistrationRepositoryInterface
{
    public function getEventRegistrations(){
        $event = DB::select("SELECT * FROM event_registrations");
        return $event;
    }

    public function getEventRegistrationsByDate($from_date = null, $to_date = null, $paramArray = null){
        $query = "SELECT * FROM event_registrations WHERE events_id = 1 AND deleted_at IS NULL";

        if(isset($from_date) && $from_date != null){
            $tempFromDate = date("Y-m-d", strtotime($from_date));
            $query .= " AND confirmed_date >= '$tempFromDate' ";
        }
        if(isset($to_date) && $to_date != null){
            $tempToDate = date("Y-m-d", strtotime($to_date));
            $query .= " AND confirmed_date <= '$tempToDate' ";
        }
        
        $result = DB::select($query);
        return $result;
    }

}