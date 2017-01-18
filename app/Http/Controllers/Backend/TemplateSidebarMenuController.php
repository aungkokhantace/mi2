<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\TemplateSidebarMenuEditRequest;
use App\Backend\Infrastructure\Forms\TemplateSidebarMenuEntryRequest;
use App\Backend\Menu\MenuRepository;
use App\Backend\Page\PageRepository;
use App\Backend\Template\TemplateRepository;
use App\Backend\TemplateSidebarMenu\TemplateSidebarMenu;
use App\Backend\TemplateSidebarMenu\TemplateSidebarMenuRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TemplateSidebarMenuController extends Controller
{
    private $repo;

    public function __construct(TemplateSidebarMenuRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                $templatesidebarmenus      = $this->repo->getObjs();
                return view('backend.templatesidebarmenu.index')->with('templatesidebarmenus', $templatesidebarmenus);
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/templatesidebarmenu');
        }
    }

    public function create(){
        if (Auth::guard('User')->check()) {
            $templateRepo = new TemplateRepository();
            $templates    = $templateRepo->getObjs();

            $pageRepo = new PageRepository();
            $pages    = $pageRepo->getPages();

            $menuRepo = new MenuRepository();
            $menus    = $menuRepo->getObjs();
            return view('backend.templatesidebarmenu.templatesidebarmenu')->with('templates',$templates)->with('pages',$pages)->with('menus',$menus);
        }
        return redirect('/');
    }

    public function store(TemplateSidebarMenuEntryRequest $request)
    {
        $request->validate();
        $name           = (Input::has('name')) ? Input::get('name') : "";
        $description    = (Input::has('description')) ? Input::get('description') : "";
        $template_id    = (Input::has('template_id')) ? Input::get('template_id') : 0;
        $page_id        = (Input::has('page_id')) ? Input::get('page_id') : 0;
        $menu_order     = (Input::has('menu_order')) ? Input::get('menu_order') : 0;
        $menu_parent_id = (Input::has('menu_parent_id')) ? Input::get('menu_parent_id') : 0;

        $paramObj = new TemplateSidebarMenu();
        $paramObj->name             = $name;
        $paramObj->description      = $description;
        $paramObj->template_id      = $template_id;
        $paramObj->page_id          = $page_id;
        $paramObj->menu_order       = $menu_order;
        $paramObj->menu_parent_id   = $menu_parent_id;

        $result = $this->repo->create($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\TemplateSidebarMenuController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template Sidebar Menu created ...'));
        }
        else{
            return redirect()->action('Backend\TemplateController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template Sidebar Menu did not create ...'));
        }
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $templatesidebarmenu = $this->repo->getObjByID($id);

            $templateRepo = new TemplateRepository();
            $templates    = $templateRepo->getObjs();

            $pageRepo = new PageRepository();
            $pages    = $pageRepo->getPages();

            $menuRepo = new MenuRepository();
            $menus    = $menuRepo->getObjs();

            return view('backend.templatesidebarmenu.templatesidebarmenu')->with('templatesidebarmenu', $templatesidebarmenu)->with('templates',$templates)->with('pages',$pages)->with('menus',$menus);
        }
        return redirect('/');
    }

    public function update(TemplateSidebarMenuEditRequest $request){
        $request->validate();
        $id = Input::get('id');
        $name           = (Input::has('name')) ? Input::get('name') : "";
        $description    = (Input::has('description')) ? Input::get('description') : "";
        $template_id    = (Input::has('template_id')) ? Input::get('template_id') : 0;
        $page_id        = (Input::has('page_id')) ? Input::get('page_id') : 0;
        $menu_order     = (Input::has('menu_order')) ? Input::get('menu_order') : 0;
        $menu_parent_id = (Input::has('menu_parent_id')) ? Input::get('menu_parent_id') : 0;

        $paramObj = TemplateSidebarMenu::find($id);
        $paramObj->name             = $name;
        $paramObj->description      = $description;
        $paramObj->template_id      = $template_id;
        $paramObj->page_id          = $page_id;
        $paramObj->menu_order       = $menu_order;
        $paramObj->menu_parent_id   = $menu_parent_id;

        $result = $this->repo->update($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\TemplateSidebarMenuController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template Sidebar Menu updated ...'));
        }
        else{
            return redirect()->action('Backend\TemplateController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template Sidebar Menu did not update ...'));
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
            return redirect()->action('Backend\TemplateSidebarMenuController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template Sidebar Menu deleted ...'));
        }
        else{
            return redirect()->action('Backend\TemplateController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template Sidebar Menu did not delete ...'));
        }
    }
}
