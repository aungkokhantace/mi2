<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\TemplateEditRequest;
use App\Backend\Infrastructure\Forms\TemplateEntryRequest;
use App\Backend\Template\Template;
use App\Backend\Template\TemplateRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TemplateController extends Controller
{
    private $repo;

    public function __construct(TemplateRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                $templates      = $this->repo->getObjs();
//                $menuCategories = Utility::getSettingsByType("MENU");
                return view('backend.template.index')->with('templates', $templates);
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/template');
        }
    }

    public function create(){
        if (Auth::guard('User')->check()) {
//            $menuCategories = Utility::getSettingsByType("MENU");
            return view('backend.template.template');
        }
        return redirect('/');
    }

    public function store(TemplateEntryRequest $request)
    {
        $request->validate();
        $name           = (Input::has('name')) ? Input::get('name') : "";
        $description    = (Input::has('description')) ? Input::get('description') : "";
        $category       = (Input::has('category')) ? Input::get('category') : 1;
        $active         = (Input::has('active')) ? 1 : 0;

        $paramObj = new Template();
        $paramObj->name         = $name;
        $paramObj->description  = $description;
        $paramObj->category     = $category;
        $paramObj->active       = $active;

        $result = $this->repo->create($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\TemplateController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template created ...'));
        }
        else{
            return redirect()->action('Backend\TemplateController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template did not create ...'));
        }
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $template = $this->repo->getObjByID($id);
//            $menuCategories = Utility::getSettingsByType("MENU");
            return view('backend.menu.menu')->with('template', $template);
        }
        return redirect('/');
    }

    public function update(TemplateEditRequest $request){
        $request->validate();
        $id = Input::get('id');
        $name           = (Input::has('name')) ? Input::get('name') : "";
        $description    = (Input::has('description')) ? Input::get('description') : "";
        $category       = (Input::has('category')) ? Input::get('category') : 1;
        $active         = (Input::has('active')) ? 1 : 0;

        $paramObj = Template::find($id);
        $paramObj->name         = $name;
        $paramObj->description  = $description;
        $paramObj->category     = $category;
        $paramObj->active       = $active;

        $result = $this->repo->update($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\TemplateController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template updated ...'));
        }
        else{
            return redirect()->action('Backend\MenuController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template did not update ...'));
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
            return redirect()->action('Backend\TemplateController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template deleted ...'));
        }
        else{
            return redirect()->action('Backend\MenuController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template did not delete ...'));
        }
    }
}
