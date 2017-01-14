<?php
/**
 * Created by PhpStorm.
 * User: william
 * Author: william
 * Date: 1/14/2017
 * Time: 10:55 AM
 */

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Backend\Infrastructure\Forms\PermissionEntryRequest;
use App\Backend\Infrastructure\Forms\PermissionEditRequest;
use App\Core\Permission\PermissionRepositoryInterface;
use App\Core\Permission\Permission;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        return view('frontend.home');
    }

}
