<?php
/**
 * Created by PhpStorm.
 * User: william
 * Author: william
 * Date: 1/25/2017
 * Time: 2:29 PM
 */

namespace App\Http\Controllers\Report;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Report\EventAbstract\ReportEventAbstractRepository;
use Carbon\Carbon;
use App\Core\FormatGenerator As FormatGenerator;
use App\Core\ReturnMessage As ReturnMessage;
use Maatwebsite\Excel\Facades\Excel;

class AbstractReportController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('User')->check()) {
            $eventRepo                  = new ReportEventAbstractRepository();
            $eventAbstracts             = $eventRepo->getEventAbstracts();
            $grandTotal                 = "00.00";
            $from_date                  = null;
            $to_date                    = null;

            return view('report.abstract_view')
                ->with('eventAbstracts', $eventAbstracts)
                ->with('grandTotal', $grandTotal)
                ->with('from_date',$from_date)
                ->with('to_date',$to_date);
        }
        return redirect('backend/login');
    }

    public function search($from_date = null, $to_date = null){
        if (Auth::guard('User')->check()) {

            $eventRepo                  = new ReportEventAbstractRepository();
            $eventAbstracts             = $eventRepo->getEventAbstractsByDate($from_date, $to_date);
            $grandTotal                 = "00.00";

            return view('report.abstract_view')
                ->with('eventAbstracts', $eventAbstracts)
                ->with('grandTotal', $grandTotal)
                ->with('from_date',$from_date)
                ->with('to_date',$to_date);
        }
        return redirect('/');
    }

    public function excel($from_date = null, $to_date = null){
        if (Auth::guard('User')->check()) {
            ob_end_clean();
            ob_start();

            $grandTotal = 0;
            $date = Carbon::parse($from_date)->format('d-m-Y'); //changing date format to show in view
            $eventRepo                  = new ReportEventAbstractRepository();
            $eventAbstracts             = $eventRepo->getEventAbstractsByDate($from_date, $to_date);


            Excel::create('RegistrationReport', function($excel)use($eventAbstracts, $grandTotal) {
                $excel->sheet('SaleSummaryReport', function($sheet)use($eventAbstracts, $grandTotal) {


                    // To do for excel export
                });
            })
                ->download('xls');
            ob_flush();
            return Redirect();
        }
        return redirect('/');
    }

}
