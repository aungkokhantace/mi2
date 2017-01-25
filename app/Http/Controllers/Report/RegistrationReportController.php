<?php
namespace App\Http\Controllers\Report;
/**
 * Created by PhpStorm.
 * User: william
 * Author: william
 * Date: 1/24/2017
 * Time: 1:38 PM
 */

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Report\EventRegistration\ReportEventRegistrationRepository;

class RegistrationReportController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('User')->check()) {
            $eventRepo                  = new ReportEventRegistrationRepository();
            $eventRegistrations         = $eventRepo->getEventRegistrations();
            $grandTotal                 = "00.00";

            return view('report.registration_view')
                ->with('eventRegistrations', $eventRegistrations)
                ->with('grandTotal', $grandTotal);
        }
        return redirect('backend/login');
    }

}
