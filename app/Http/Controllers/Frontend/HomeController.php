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
        return view('layouts_frontend.master_frontend');
    }

    public function test(Request $request)
    {
//        $menuRepo = new MenuRepository();
//        $mainMenus = $menuRepo->getObjByType(2);//2 is for main menu

//        $menuDetailRepo = new MenuDetailRepository();

//        $mainParents    = $menuDetailRepo->getParentByMenuType(2); //2 is for main menu
//        $mainResult = $mainParents;
//        foreach($mainResult as $k=>$v){
//            $subresult = $this->categoriesTree($mainResult[$k]);
//            $mainResult[$k]->subCategories=$subresult;
//        }
//
//        $headerParents    = $menuDetailRepo->getParentByMenuType(1); //1 is for header menu
//        $headerResult = $headerParents;
//        foreach($headerResult as $k=>$v){
//            $subresult = $this->categoriesTree($headerResult[$k]);
//            $headerResult[$k]->subCategories=$subresult;
//        }
//
//        $footerParents    = $menuDetailRepo->getParentByMenuType(4); //4 is for footer menu
//        $footerResult = $footerParents;
//        foreach($footerResult as $k=>$v){
//            $subresult = $this->categoriesTree($footerResult[$k]);
//            $footerResult[$k]->subCategories=$subresult;
//        }

        return view('frontend.test');
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
}
