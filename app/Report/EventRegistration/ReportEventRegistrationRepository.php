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
use Illuminate\Support\Facades\Input;
use App\Backend\Event\Event;
use App\Core\Utility;

class ReportEventRegistrationRepository implements ReportEventRegistrationRepositoryInterface
{
        public function getEventRegistrations(){
        $event = DB::select("SELECT * FROM event_registrations");
        return $event;
    }

}