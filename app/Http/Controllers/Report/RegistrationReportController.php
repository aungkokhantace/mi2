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
use Carbon\Carbon;
use App\Core\FormatGenerator As FormatGenerator;
use App\Core\ReturnMessage As ReturnMessage;
use Maatwebsite\Excel\Facades\Excel;
use App\Core\Utility;
use PDF;

class RegistrationReportController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::guard('User')->check()) {
            $eventRepo                  = new ReportEventRegistrationRepository();
            $eventRegistrations         = $eventRepo->getEventRegistrations();
            $grandTotal                 = "00.00";
            $from_date                  = null;
            $to_date                    = null;

            return view('report.registration_view')
                ->with('eventRegistrations', $eventRegistrations)
                ->with('grandTotal', $grandTotal)
                ->with('from_date',$from_date)
                ->with('to_date',$to_date);
        }
        return redirect('backend/login');
    }

    public function search($from_date = null, $to_date = null){
        if (Auth::guard('User')->check()) {

            $eventRepo                  = new ReportEventRegistrationRepository();
            $eventRegistrations         = $eventRepo->getEventRegistrationsByDate($from_date, $to_date);
            dd($eventRegistrations);
            $grandTotal                 = "00.00";

            return view('report.registration_view')
                ->with('eventRegistrations', $eventRegistrations)
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
            $eventRepo                  = new ReportEventRegistrationRepository();
            $eventRegistrations         = $eventRepo->getEventRegistrationsByDate($from_date, $to_date);
            // 
            $displayArray = array();
            foreach($eventRegistrations as $value){
                $displayArray[$value->id]["firstname"]=$value->first_name;
                $displayArray[$value->id]["middlename"]=$value->middle_name;
                $displayArray[$value->id]["lastname"]=$value->last_name;
                $displayArray[$value->id]["title"]=$value->title;
                $displayArray[$value->id]["country"]=$value->country;
                $displayArray[$value->id]["wherework"]=$value->where_work;
                $displayArray[$value->id]["medicalspecialities"]=$value->medical_specialities;
                $displayArray[$value->id]["phoneno"]=$value->phone_no;
                $displayArray[$value->id]["registrationcategory"]=$value->registration_category;
                $displayArray[$value->id]["paymenttype"]=$value->payment_type;
                $displayArray[$value->id]["status"]=$value->status;


            }

            Excel::create('RegistrationReport', function($excel)use($displayArray) {
                $excel->sheet('RegistrationReport', function($sheet)use($displayArray) {
                    $sheet->fromArray($displayArray);
                });
            // 

            })
                ->download('xls');
            ob_flush();
            return Redirect();
        }
        return redirect('/');
    }

     public function export($from_date = null, $to_date = null)
     {
        if (Auth::guard('User')->check()) {
            ob_end_clean();
            ob_start();

            $grandTotal = 0;
            $date = Carbon::parse($from_date)->format('d-m-Y'); //changing date format to show in view
            $eventRepo                  = new ReportEventRegistrationRepository();
            $eventRegistrations         = $eventRepo->getEventRegistrationsByDate($from_date, $to_date);
            $html = '
                <style>
                table, td, th
                {    
                    border: 1px;
                    text-align: left;
                }

                th, td {
                    padding: 15px;
                }
                </style>
                <table border="1px;" >
                            <thead>
                            <tr style="color:#FFF;background-color:#2196f3;">
                                <th background-color: blue;>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Work Place</th>
                            </tr>
                            </thead>
                            <tbody>';

                    foreach($eventRegistrations as $pdf){
                        $html .= '<tr height="30">';
                        $html .= '<td> '. $pdf->first_name .'</td>';
                        $html .= '<td>'. $pdf->middle_name .'</td>';
                        $html .= '<td>'. $pdf->last_name .'</td>';
                        $html .= '<td>'. $pdf->email .'</td>';
                        $html .= '<td>'. $pdf->country .'</td>';
                         $html .= '<td>'. $pdf->where_work .'</td>';
                        $html .= '</tr>';
                    }
                    
                    $html .= '</tbody>
                                </table>';

                Utility::exportPDF($html);
        }
            return redirect('/');
        
    }

}
