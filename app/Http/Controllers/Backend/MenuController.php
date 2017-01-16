<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\MenuEditRequest;
use App\Backend\Infrastructure\Forms\MenuEntryRequest;
use App\Backend\Menu\Menu;
use App\Backend\Menu\MenuRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class MenuController extends Controller
{
    private $repo;

    public function __construct(MenuRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                $menus      = $this->repo->getObjs();
                $menuCategories = Utility::getSettingsByType("MENU");
                return view('backend.menu.index')->with('menus', $menus)->with('menuCategories', $menuCategories);
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/menu');
        }
    }

    public function create(){
        if (Auth::guard('User')->check()) {
            $menuCategories = Utility::getSettingsByType("MENU");
            return view('backend.menu.menu')->with('menuCategories',$menuCategories);
        }
        return redirect('/');
    }

    public function store(MenuEntryRequest $request)
    {
        $request->validate();
        $name           = (Input::has('name')) ? Input::get('name') : "";
        $description    = (Input::has('description')) ? Input::get('description') : "";
        $category       = (Input::has('category')) ? Input::get('category') : 1;
        $active         = (Input::has('active')) ? 1 : 0;

        $paramObj = new Menu();
        $paramObj->name         = $name;
        $paramObj->description  = $description;
        $paramObj->category     = $category;
        $paramObj->active       = $active;

        $result = $this->repo->create($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\MenuController@index')
                ->withMessage(FormatGenerator::message('Success', 'Menu created ...'));
        }
        else{
            return redirect()->action('Backend\MenuController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Menu did not create ...'));
        }
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $menu = $this->repo->getObjByID($id);
            $menuCategories = Utility::getSettingsByType("MENU");
            return view('backend.menu.menu')->with('menu', $menu)->with('menuCategories', $menuCategories);
        }
        return redirect('/');
    }

    public function update(MenuEditRequest $request){
        $request->validate();
        $id = Input::get('id');
        $name           = (Input::has('name')) ? Input::get('name') : "";
        $description    = (Input::has('description')) ? Input::get('description') : "";
        $category       = (Input::has('category')) ? Input::get('category') : 1;
        $active         = (Input::has('active')) ? 1 : 0;

        $paramObj = Menu::find($id);
        $paramObj->name         = $name;
        $paramObj->description  = $description;
        $paramObj->category     = $category;
        $paramObj->active       = $active;

        $result = $this->repo->update($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\MenuController@index')
                ->withMessage(FormatGenerator::message('Success', 'Menu updated ...'));
        }
        else{
            return redirect()->action('Backend\MenuController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Menu did not update ...'));
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
            return redirect()->action('Backend\MenuController@index')
                ->withMessage(FormatGenerator::message('Success', 'Menu deleted ...'));
        }
        else{
            return redirect()->action('Backend\MenuController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Menu did not delete ...'));
        }
    }
}
