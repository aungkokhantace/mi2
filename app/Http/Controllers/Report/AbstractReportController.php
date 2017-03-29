<?php
/**
 * Created by PhpStorm.
 * User: william
 * Author: william
 * Date: 1/25/2017
 * Time: 2:29 PM
 */

namespace App\Http\Controllers\Report;
use App\Backend\MedicalSpeciality\MedicalSpecialityRepository;
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

            foreach($eventAbstracts as $abstract){
                if($abstract->medical_speciality_id == 0){
                    $abstract->medical_speciality = $abstract->medical_speciality_other;
                }
                else{
                    $specialityRepo = new MedicalSpecialityRepository();
                    $medical_speciality = $specialityRepo->getObjByID($abstract->medical_speciality_id);
                    $abstract->medical_speciality = $medical_speciality->name;
                }
            }

            //change title numbers to title names
            foreach($eventAbstracts as $absTitle){
                if($absTitle->title == 1){
                    $absTitle->title = "Dr.";
                }
                elseif($absTitle->title == 2){
                    $absTitle->title = "Professor";
                }
                elseif($absTitle->title == 3){
                    $absTitle->title = "Mr.";
                }
                elseif($absTitle->title == 4){
                    $absTitle->title = "Mrs.";
                }
                else{
                    $absTitle->title = "Ms.";
                }
            }
            //change title numbers to title names

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

            //get country name
            foreach($eventAbstracts as $absCountry){
                if(isset($absCountry->country)){
                    $absCountry->country = Utility::getCountryNameByValue($absCountry->country);
                }
            }

            foreach($eventAbstracts as $abstract){
                if($abstract->medical_speciality_id == 0){
                    $abstract->medical_speciality = $abstract->medical_speciality_other;
                }
                else{
                    $specialityRepo = new MedicalSpecialityRepository();
                    $medical_speciality = $specialityRepo->getObjByID($abstract->medical_speciality_id);
                    $abstract->medical_speciality = $medical_speciality->name;
                }
            }

            $grandTotal                 = "00.00";

            foreach($eventAbstracts as $absTitle){
                if($absTitle->title == 1){
                    $absTitle->title = "Dr.";
                }
                elseif($absTitle->title == 2){
                    $absTitle->title = "Professor";
                }
                elseif($absTitle->title == 3){
                    $absTitle->title = "Mr.";
                }
                elseif($absTitle->title == 4){
                    $absTitle->title = "Mrs.";
                }
                else{
                    $absTitle->title = "Ms.";
                }
            }

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

            foreach($eventAbstracts as $abstract){
                if($abstract->medical_speciality_id == 0){
                    $abstract->medical_speciality = $abstract->medical_speciality_other;
                }
                else{
                    $specialityRepo = new MedicalSpecialityRepository();
                    $medical_speciality = $specialityRepo->getObjByID($abstract->medical_speciality_id);
                    $abstract->medical_speciality = $medical_speciality->name;
                }
            }

            $displayArray = array();
            foreach($eventAbstracts as $value){
                $country = Utility::getCountryNameByValue($value->country); //get country name

                //change title numbers to title names
                if($value->title == 1){
                    $value->title = "Dr.";
                }
                elseif($value->title == 2){
                    $value->title = "Professor";
                }
                elseif($value->title == 3){
                    $value->title = "Mr.";
                }
                elseif($value->title == 4){
                    $value->title = "Mrs.";
                }
                else{
                    $value->title = "Ms.";
                }
                //change title numbers to title names

                $displayArray[$value->id]["First Name"]=$value->first_name;
                $displayArray[$value->id]["Middle Name"]=$value->middle_name;
                $displayArray[$value->id]["Last Name"]=$value->last_name;
                $displayArray[$value->id]["Title"]=$value->title;
                $displayArray[$value->id]["Email"]=$value->email;
                $displayArray[$value->id]["Country"]=$country;
                $displayArray[$value->id]["Medical Specialities"]=$value->medical_speciality;
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
//            $eventAbstracts             = $eventRepo->getEventAbstracts($from_date, $to_date);
            $eventAbstracts             = $eventRepo->getEventAbstractsByDate($from_date, $to_date);

            foreach($eventAbstracts as $abstract){
                if($abstract->medical_speciality_id == 0){
                    $abstract->medical_speciality = $abstract->medical_speciality_other;
                }
                else{
                    $specialityRepo = new MedicalSpecialityRepository();
                    $medical_speciality = $specialityRepo->getObjByID($abstract->medical_speciality_id);
                    $abstract->medical_speciality = $medical_speciality->name;
                }
            }

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
                                <th>Title</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Medical Specialities</th>
                            </tr>
                            </thead>
                            <tbody>';

                    foreach($eventAbstracts as $pdf){
                        $country = Utility::getCountryNameByValue($pdf->country); //get country name

                        //change title numbers to title names
                        if($pdf->title == 1){
                            $pdf->title = "Dr.";
                        }
                        elseif($pdf->title == 2){
                            $pdf->title = "Professor";
                        }
                        elseif($pdf->title == 3){
                            $pdf->title = "Mr.";
                        }
                        elseif($pdf->title == 4){
                            $pdf->title = "Mrs.";
                        }
                        else{
                            $pdf->title = "Ms.";
                        }
                        //change title numbers to title names

                        $html .= '<tr height="30">';
                        $html .= '<td> '. $pdf->first_name .'</td>';
                        $html .= '<td>'. $pdf->middle_name .'</td>';
                        $html .= '<td>'. $pdf->last_name .'</td>';
                        $html .= '<td>'. $pdf->title .'</td>';
                        $html .= '<td>'. $pdf->email .'</td>';
                        $html .= '<td>'. $country .'</td>';
                        $html .= '<td>'. $pdf->medical_speciality .'</td>';
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
