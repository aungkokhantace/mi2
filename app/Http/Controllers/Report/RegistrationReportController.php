<?php
namespace App\Http\Controllers\Report;
/**
 * Created by PhpStorm.
 * User: william
 * Author: william
 * Date: 1/24/2017
 * Time: 1:38 PM
 */

use App\Backend\RegistrationCategory\RegistrationCategoryRepository;
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
            $grandTotal_mmk                 = 0;
            $grandTotal_usd                 = 0;
            $from_date                  = null;
            $to_date                    = null;

            foreach($eventRegistrations as $reg){
                if(isset($reg->country)){
                    $reg->country = Utility::getCountryNameByValue($reg->country);
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

            //change title numbers to title names
            foreach($eventRegistrations as $regTitle){
                if($regTitle->title == 1){
                    $regTitle->title = "Dr.";
                }
                elseif($regTitle->title == 2){
                    $regTitle->title = "Professor";
                }
                elseif($regTitle->title == 3){
                    $regTitle->title = "Mr.";
                }
                elseif($regTitle->title == 4){
                    $regTitle->title = "Mrs.";
                }
                else{
                    $regTitle->title = "Ms.";
                }
            }
            //change title numbers to title names

            //start calculating amount
            //get early bird date
            $early_bird_date = Utility::getEarlyBirdDate();

            foreach($eventRegistrations as $regAmount){
                $registrationCategory = $regAmount->registration_category;

                $registrationCategoryRepo = new RegistrationCategoryRepository();
                $regCategoryObj = $registrationCategoryRepo->getObjByID($registrationCategory);

                $confirmed_date = $regAmount->confirmed_date;

                $regCategoryObj->currency_type = strtoupper($regCategoryObj->currency_type); //change currency type to upper case

                if($confirmed_date <= $early_bird_date){
                    $fee_amount = $regCategoryObj->early_bird_fee;
                }
                else{
                    $fee_amount = $regCategoryObj->normal_fee;
                }

                $regAmount->currency_type = $regCategoryObj->currency_type;
                $regAmount->amount = $fee_amount;
            }
            //end calculating amount

            //start calculating grand total
            foreach($eventRegistrations as $regGrandTotal){
                if($regGrandTotal->currency_type == "MMK"){
                    $grandTotal_mmk += $regGrandTotal->amount;
                }
                else{
                    $grandTotal_usd += $regGrandTotal->amount;
                }
            }
            //end calculating grand total

            //Add currency signs
            $grandTotal_mmk = "MMK ".$grandTotal_mmk;
            $grandTotal_usd = "USD ".$grandTotal_usd;

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

            return view('report.registration_view')
                ->with('eventRegistrations', $eventRegistrations)
                ->with('grandTotal_mmk', $grandTotal_mmk)
                ->with('grandTotal_usd', $grandTotal_usd)
                ->with('from_date',$from_date)
                ->with('to_date',$to_date);
        }
        return redirect('backend/login');
    }

    public function search($from_date = null, $to_date = null){
        if (Auth::guard('User')->check()) {

            $grandTotal_mmk                 = 0;
            $grandTotal_usd                 = 0;

            $eventRepo                  = new ReportEventRegistrationRepository();
            $eventRegistrations         = $eventRepo->getEventRegistrationsByDate($from_date, $to_date);

            foreach($eventRegistrations as $reg){
                if(isset($reg->country)){
                    $reg->country = Utility::getCountryNameByValue($reg->country);
                }
            }

            //start calculating amount
            //get early bird date
            $early_bird_date = Utility::getEarlyBirdDate();

            foreach($eventRegistrations as $regAmount){
                $registrationCategory = $regAmount->registration_category;

                $registrationCategoryRepo = new RegistrationCategoryRepository();
                $regCategoryObj = $registrationCategoryRepo->getObjByID($registrationCategory);

                $confirmed_date = $regAmount->confirmed_date;

                $regCategoryObj->currency_type = strtoupper($regCategoryObj->currency_type); //change currency type to upper case

                if($confirmed_date <= $early_bird_date){
                    $fee_amount = $regCategoryObj->early_bird_fee;
                }
                else{
                    $fee_amount = $regCategoryObj->normal_fee;
                }
                $regAmount->currency_type = $regCategoryObj->currency_type;
                $regAmount->amount = $fee_amount;
            }
            //end calculating amount

            //start calculating grand total
            foreach($eventRegistrations as $regGrandTotal){
                if($regGrandTotal->currency_type == "MMK"){
                    $grandTotal_mmk += $regGrandTotal->amount;
                }
                else{
                    $grandTotal_usd += $regGrandTotal->amount;
                }
            }
            //end calculating grand total

            //Add currency signs
            $grandTotal_mmk = "MMK ".$grandTotal_mmk;
            $grandTotal_usd = "USD ".$grandTotal_usd;

            //change title numbers to title names
            foreach($eventRegistrations as $regTitle){
                if($regTitle->title == 1){
                    $regTitle->title = "Dr.";
                }
                elseif($regTitle->title == 2){
                    $regTitle->title = "Professor";
                }
                elseif($regTitle->title == 3){
                    $regTitle->title = "Mr.";
                }
                elseif($regTitle->title == 4){
                    $regTitle->title = "Mrs.";
                }
                else{
                    $regTitle->title = "Ms.";
                }
            }
            //change title numbers to title names

            return view('report.registration_view')
                ->with('eventRegistrations', $eventRegistrations)
                ->with('grandTotal_mmk', $grandTotal_mmk)
                ->with('grandTotal_usd', $grandTotal_usd)
                ->with('from_date',$from_date)
                ->with('to_date',$to_date);
        }
        return redirect('/');
    }

    public function excel($from_date = null, $to_date = null){
        if (Auth::guard('User')->check()) {
            ob_end_clean();
            ob_start();

            $grandTotal_mmk                 = 0;
            $grandTotal_usd                 = 0;

            $date = Carbon::parse($from_date)->format('d-m-Y'); //changing date format to show in view
            $eventRepo                  = new ReportEventRegistrationRepository();
            $eventRegistrations         = $eventRepo->getEventRegistrationsByDate($from_date, $to_date);
            // 
            $displayArray = array();
            foreach($eventRegistrations as $value){
                $country = Utility::getCountryNameByValue($value->country); //get country name

                //start calculating amount
                //get early bird date
                $early_bird_date = Utility::getEarlyBirdDate();

                $registrationCategory = $value->registration_category;

                $registrationCategoryRepo = new RegistrationCategoryRepository();
                $regCategoryObj = $registrationCategoryRepo->getObjByID($registrationCategory);

                $confirmed_date = $value->confirmed_date;

                $regCategoryObj->currency_type = strtoupper($regCategoryObj->currency_type); //change currency type to upper case

                if($confirmed_date <= $early_bird_date){
                    $fee_amount = $regCategoryObj->early_bird_fee;
                }
                else{
                    $fee_amount = $regCategoryObj->normal_fee;
                }

                $value->currency_type = $regCategoryObj->currency_type;
                $value->amount = $fee_amount;
                //end calculating amount

                //start calculating grand total
                if($value->currency_type == "MMK"){
                    $grandTotal_mmk += $value->amount;
                }
                else{
                    $grandTotal_usd += $value->amount;
                }
                //end calculating grand total

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
                if($value->currency_type == "USD"){
                    $displayArray[$value->id]["Total Amount(MMK)"]= "0";
                    $displayArray[$value->id]["Total Amount(USD)"]= $value->amount;
                }
                else{
                    $displayArray[$value->id]["Total Amount(MMK)"]=$value->amount;
                    $displayArray[$value->id]["Total Amount(USD)"]= "0";
                }

//                $displayArray[$value->id]["Working Place"]=$value->where_work;
            }

            //Add currency signs
            $grandTotal_mmk = "MMK ".$grandTotal_mmk;
            $grandTotal_usd = "USD ".$grandTotal_usd;

            Excel::create('RegistrationReport', function($excel)use($displayArray,$grandTotal_mmk,$grandTotal_usd) {
                $excel->sheet('RegistrationReport', function($sheet)use($displayArray,$grandTotal_mmk,$grandTotal_usd) {
                    $sheet->fromArray($displayArray);
                    $sheet->appendRow(array(
                        'Grand Total','','','','','',$grandTotal_mmk,$grandTotal_usd
                    ));
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

            $grandTotal_mmk                 = 0;
            $grandTotal_usd                 = 0;

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
                                <th>Title</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Total Amount(MMK)</th>
                                <th>Total Amount(USD)</th>
                            </tr>
                            </thead>
                            <tbody>';


//                    dd($grandTotal_mmk,$grandTotal_usd);
                    foreach($eventRegistrations as $pdf){
                        $country = Utility::getCountryNameByValue($pdf->country); //get country name

                        //start calculating amount
                        //get early bird date
                        $early_bird_date = Utility::getEarlyBirdDate();

                        $registrationCategory = $pdf->registration_category;

                        $registrationCategoryRepo = new RegistrationCategoryRepository();
                        $regCategoryObj = $registrationCategoryRepo->getObjByID($registrationCategory);

                        $confirmed_date = $pdf->confirmed_date;

                        $regCategoryObj->currency_type = strtoupper($regCategoryObj->currency_type); //change currency type to upper case

                        if($confirmed_date <= $early_bird_date){
                            $fee_amount = $regCategoryObj->early_bird_fee;
                        }
                        else{
                            $fee_amount = $regCategoryObj->normal_fee;
                        }

                        $pdf->currency_type = $regCategoryObj->currency_type;
                        $pdf->amount = $fee_amount;
                        //end calculating amount

                        //start calculating grand total
                        if($pdf->currency_type == "MMK"){
                            $grandTotal_mmk += $pdf->amount;
                        }
                        else{
                            $grandTotal_usd += $pdf->amount;
                        }
                        //end calculating grand total

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
                        if($pdf->currency_type == "USD"){
                            $html .= '<td>0</td>';
                            $html .= '<td>'. $pdf->amount .'</td>';
                        }
                        else{
                            $html .= '<td>'. $pdf->amount .'</td>';
                            $html .= '<td>0</td>';
                        }
                        $html .= '</tr>';
                    }

                    //Add currency signs
                    $grandTotal_mmk = "MMK ".$grandTotal_mmk;
                    $grandTotal_usd = "USD ".$grandTotal_usd;

                    $html .= '<tr>
                                  <td>Grand Total</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td>'.$grandTotal_mmk.'</td>
                                  <td>'.$grandTotal_usd.'</td>
                               </tr>';

                    $html .= '</tbody>
                                </table>';

                Utility::exportPDF($html);
        }
            return redirect('/');
        
    }

}
