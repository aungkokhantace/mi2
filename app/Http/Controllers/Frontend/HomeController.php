<?php
/**
 * Created by PhpStorm.
 * User: william
 * Author: Wai Yan Aung
 * Date: 1/14/2017
 * Time: 10:55 AM
 */

namespace App\Http\Controllers\Frontend;

use App\Backend\Menu\MenuRepository;
use App\Backend\Menudetail\MenudetailRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Redirect;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        return view('frontend.home');
    }

    public function test(Request $request)
    {
        return view('frontend.home');
    }

    function categoriesTree($result){
        $id=$result->id;
        $menuDetailRepo = new MenuDetailRepository();
        $sresult = $menuDetailRepo->getChildrenByID($id);
        foreach($sresult as $k=>$v){
            $subresult = $this->categoriesTree($sresult[$k]);
            $sresult[$k]->subCategories= $subresult;
        }
        return $sresult;
    }

    public function exhibitor(Request $request)
    {
        return view('frontend.event.event_exhibitor_info');
    }

    public function conference(Request $request)
    {
        return view('frontend.event.event_conference_info');
    }

    public function other(Request $request)
    {
        return view('frontend.event.event_other_info');
    }

    public function comingsoon(Request $request)
    {
        return view('frontend.comingsoon');
    }
}
