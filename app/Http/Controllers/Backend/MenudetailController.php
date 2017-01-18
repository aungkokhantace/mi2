<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\MenudetailEditRequest;
use App\Backend\Infrastructure\Forms\MenudetailEntryRequest;
use App\Backend\Menu\MenuRepository;
use App\Backend\Menudetail\Menudetail;
use App\Backend\Menudetail\MenudetailRepository;
use App\Backend\Menudetail\MenudetailRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MenudetailController extends Controller
{
    private $repo;

    public function __construct(MenudetailRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                $menudetails      = $this->repo->getObjs();
                return view('backend.menudetail.index')->with('menudetails', $menudetails);
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/menudetail');
        }
    }

    public function create(){
        $menuRepo = new MenuRepository();
        $menus    = $menuRepo->getObjs();

        $menuDetailRepo = new MenuDetailRepository();
        $menudetails    = $menuDetailRepo->getObjs();

        if (Auth::guard('User')->check()) {
            return view('backend.menudetail.menudetail')->with('menus',$menus)->with('menudetails',$menudetails);
        }
        return redirect('/');
    }

    public function store(MenudetailEntryRequest $request)
    {
        $request->validate();
        $menu_id            = (Input::has('menu')) ? Input::get('menu') : "";
        $page_url           = (Input::has('page_url')) ? Input::get('page_url') : "";
        $menu_order         = (Input::has('menu_order')) ? Input::get('menu_order') : 1;
        $status             = (Input::has('status')) ? Input::get('status') : "active";
        $menu_group         = (Input::has('menu_group')) ? Input::get('menu_group') : 1;
        $menu_group_order   = (Input::has('menu_group_order')) ? Input::get('menu_group_order') : 1;
        $name               = (Input::has('name')) ? Input::get('name') : "";
        $parent_id          = (Input::has('parent')) ? Input::get('parent') : 0;

        $paramObj = new Menudetail();
        $paramObj->menu_id             = $menu_id;
        $paramObj->page_url         = $page_url;
        $paramObj->menu_order       = $menu_order;
        $paramObj->status           = $status;
        $paramObj->menu_group       = $menu_group;
        $paramObj->menu_group_order = $menu_group_order;
        $paramObj->name             = $name;
        $paramObj->parent_id        = $parent_id;

        $result = $this->repo->create($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\MenudetailController@index')
                ->withMessage(FormatGenerator::message('Success', 'Menu Detail created ...'));
        }
        else{
            return redirect()->action('Backend\MenudetailController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Menu Detail did not create ...'));
        }
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $menuRepo = new MenuRepository();
            $menus    = $menuRepo->getObjs();
            $menudetail = $this->repo->getObjByID($id);
            return view('backend.menudetail.menudetail')->with('menudetail', $menudetail)->with('menus', $menus );
        }
        return redirect('/');
    }

    public function update(MenudetailEntryRequest $request){
        $request->validate();
        $id = Input::get('id');
        $menu_id            = (Input::has('menu')) ? Input::get('menu') : "";
        $page_url           = (Input::has('page_url')) ? Input::get('page_url') : "";
        $menu_order         = (Input::has('menu_order')) ? Input::get('menu_order') : 1;
        $status             = (Input::has('status')) ? Input::get('status') : "active";
        $menu_group         = (Input::has('menu_group')) ? Input::get('menu_group') : 1;
        $menu_group_order   = (Input::has('menu_group_order')) ? Input::get('menu_group_order') : 1;
        $name               = (Input::has('name')) ? Input::get('name') : "";
        $parent_id          = (Input::has('parent')) ? Input::get('parent') : 0;

        $paramObj = Menudetail::find($id);
        $paramObj->menu_id             = $menu_id;
        $paramObj->page_url         = $page_url;
        $paramObj->menu_order       = $menu_order;
        $paramObj->status           = $status;
        $paramObj->menu_group       = $menu_group;
        $paramObj->menu_group_order = $menu_group_order;
        $paramObj->name             = $name;
        $paramObj->parent_id        = $parent_id;

        $result = $this->repo->update($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\MenudetailController@index')
                ->withMessage(FormatGenerator::message('Success', 'Menu Detail updated ...'));
        }
        else{
            return redirect()->action('Backend\MenudetailController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Menu Detail did not update ...'));
        }
    }

    public function destroy(){
        $id         = Input::get('selected_checkboxes');
        $new_string = explode(',', $id);
        $delete_flag = true;
        foreach($new_string as $id){
            $this->repo->delete($id);
        }
        if($delete_flag){
            return redirect()->action('Backend\MenudetailController@index')
                ->withMessage(FormatGenerator::message('Success', 'Menu Detail deleted ...'));
        }
        else{
            return redirect()->action('Backend\MenudetailController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Menu Detail did not delete ...'));
        }
    }
}
