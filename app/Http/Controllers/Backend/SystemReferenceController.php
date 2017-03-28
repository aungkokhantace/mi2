<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 3/15/2017
 * Time: 11:50 AM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\RegistrationCategoryEditRequest;
use App\Backend\Infrastructure\Forms\RegistrationCategoryEntryRequest;
use App\Backend\RegistrationCategory\RegistrationCategory;
use App\Backend\RegistrationCategory\RegistrationCategoryRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class SystemReferenceController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                return view('backend.systemreference.systemreference');
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/systemreference');
        }
    }
}
