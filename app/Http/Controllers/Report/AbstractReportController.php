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
use App\Core\Utility;
use PDF;

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

            foreach($eventAbstracts as $absCountry){
                if(isset($absCountry->country)){
                    $absCountry->country = Utility::getCountryNameByValue($absCountry->country);
                }
            }

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
            $eventAbstracts             = $eventRepo->getEventAbstracts($from_date, $to_date);

            $displayArray = array();
            foreach($eventAbstracts as $value){
                $country = Utility::getCountryNameByValue($value->country); //get country name

                $displayArray[$value->id]["First Name"]=$value->first_name;
                $displayArray[$value->id]["Middle Name"]=$value->middle_name;
                $displayArray[$value->id]["Last Name"]=$value->last_name;
                $displayArray[$value->id]["Email"]=$value->email;
                $displayArray[$value->id]["Country"]=$country;
                $displayArray[$value->id]["Medical Specialities"]=$value->medical_specialities;
            }


           Excel::create('RegistrationReport', function($excel)use($displayArray) {
                $excel->sheet('RegistrationReport', function($sheet)use($displayArray) {
                    $sheet->fromArray($displayArray);
                });
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
            $eventRepo                  = new ReportEventAbstractRepository();
            $eventAbstracts             = $eventRepo->getEventAbstracts($from_date, $to_date);

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
                        <table border="1">

                            <thead >
                            <tr height="30" style="color:#FFF;background-color:#2196f3;">
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Medical Specialities</th>
                            </tr>
                            </thead>
                            <tbody>';

                    foreach($eventAbstracts as $pdf){
                        $country = Utility::getCountryNameByValue($pdf->country); //get country name

                        $html .= '<tr height="30">';
                        $html .= '<td> '. $pdf->first_name .'</td>';
                        $html .= '<td>'. $pdf->middle_name .'</td>';
                        $html .= '<td>'. $pdf->last_name .'</td>';
                        $html .= '<td>'. $pdf->email .'</td>';
                        $html .= '<td>'. $country .'</td>';
                        $html .= '<td>'. $pdf->medical_specialities .'</td>';
                        $html .= '</tr>';
                    }
                    // foreach($eventAbstracts as $pdf){
                    //     $html .= '<tr height="30">';
                    //     $html .= '<td>1</td>';
                    //     $html .= '<td>2</td>';
                    //     $html .= '<td>3</td>';
                    //     $html .= '<td>4</td>';
                    //     $html .= '<td>5</td>';
                    //     $html .= '</tr>';
                    // }
                    $html .= '</tbody>
                                </table>';

                Utility::exportPDF($html);
        }
        return redirect('/');
    }

}
