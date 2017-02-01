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

            foreach($eventRegistrations as $reg){
                if(isset($reg->country)){
                    $reg->country = Utility::getCountryNameByValue($reg->country);
                }
            }

            foreach($eventRegistrations as $regCategory){
                if(isset($regCategory->registration_category) && $regCategory->registration_category == 1){
                    $regCategory->registration_category = "International Delegate";
                }
                elseif(isset($regCategory->registration_category) && $regCategory->registration_category == 2){
                    $regCategory->registration_category = "Local Delegate";
                }
                else{
                    $regCategory->registration_category = "Local Trainee";
                }
            }

            foreach($eventRegistrations as $regPayment){
                if(isset($regPayment->payment_type) && $regPayment->payment_type == 1){
                    $regPayment->payment_type = "Cash";
                }
                else{
                    $regPayment->payment_type = "Bank Transfer";
                }
            }

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
                $country = Utility::getCountryNameByValue($value->country); //get country name

                $displayArray[$value->id]["First Name"]=$value->first_name;
                $displayArray[$value->id]["Middle Name"]=$value->middle_name;
                $displayArray[$value->id]["Last Name"]=$value->last_name;
                $displayArray[$value->id]["Email"]=$value->email;
                $displayArray[$value->id]["Country"]=$country;
                $displayArray[$value->id]["Working Place"]=$value->where_work;

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
                                <th>Working Place</th>
                            </tr>
                            </thead>
                            <tbody>';

                    foreach($eventRegistrations as $pdf){
                        $country = Utility::getCountryNameByValue($pdf->country); //get country name

                        $html .= '<tr height="30">';
                        $html .= '<td> '. $pdf->first_name .'</td>';
                        $html .= '<td>'. $pdf->middle_name .'</td>';
                        $html .= '<td>'. $pdf->last_name .'</td>';
                        $html .= '<td>'. $pdf->email .'</td>';
                        $html .= '<td>'. $country .'</td>';
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
