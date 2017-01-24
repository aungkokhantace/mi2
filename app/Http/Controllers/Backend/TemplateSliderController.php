<?php
/**
 * Created by PhpStorm.
 * Author: Aung Ko Khant
 * Date: 1/14/2017
 * Time: 5:01 PM
 */
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\TemplateSliderEditRequest;
use App\Backend\Infrastructure\Forms\TemplateSliderEntryRequest;
use App\Backend\TemplateSlider\TemplateSlider;
use App\Backend\TemplateSlider\TemplateSliderRepositoryInterface;
use App\Backend\Template\TemplateRepository;
use App\Backend\TemplateSliderDetail\TemplateSliderDetail;
use App\Backend\TemplateSliderDetail\TemplateSliderDetailRepository;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use App\Core\Utility;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TemplateSliderController extends Controller
{
    private $repo;

    public function __construct(TemplateSliderRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                $templatesliders      = $this->repo->getObjs();
                return view('backend.templateslider.index')->with('templatesliders', $templatesliders);
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/templateslider');
        }
    }

    public function create(){
        if (Auth::guard('User')->check()) {
            $templateRepo = new TemplateRepository();
            $templates    = $templateRepo->getObjs();
            return view('backend.templateslider.templateslider')->with('templates',$templates);
        }
        return redirect('/');
    }

    public function store(TemplateSliderEntryRequest $request)
    {
        $request->validate();
        $name           = (Input::has('name')) ? Input::get('name') : "";
        $description    = (Input::has('description')) ? Input::get('description') : "";
        $template_id    = (Input::has('template_id')) ? Input::get('template_id') : 1;
        $active         = (Input::has('active')) ? 1 : 0;

        $paramObj = new TemplateSlider();
        $paramObj->name         = $name;
        $paramObj->description  = $description;
        $paramObj->template_id  = $template_id;
        $paramObj->active       = $active;

        $result = $this->repo->create($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\TemplateSliderController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template Slider created ...'));
        }
        else{
            return redirect()->action('Backend\TemplateSliderController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template Slider did not create ...'));
        }
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $templateslider = $this->repo->getObjByID($id);
            $templateRepo = new TemplateRepository();
            $templates    = $templateRepo->getObjs();

            //for slider view
            $template_slider_id = $templateslider->id;
            $sliderdetailRepo = new TemplateSliderDetailRepository();
            $images      = $sliderdetailRepo->getObjsById($template_slider_id);
            $status = "active";
            //for slider view

            return view('backend.templateslider.templateslider')->with('templateslider', $templateslider)->with('templates', $templates)->with('images', $images)->with('$status', $status);
        }
        return redirect('/');
    }

    public function update(TemplateSliderEditRequest $request){
        $request->validate();
        $id = Input::get('id');
        $name           = (Input::has('name')) ? Input::get('name') : "";
        $description    = (Input::has('description')) ? Input::get('description') : "";
        $template_id    = (Input::has('template_id')) ? Input::get('template_id') : 1;
        $active         = (Input::has('active')) ? 1 : 0;

        $paramObj = TemplateSlider::find($id);
        $paramObj->name         = $name;
        $paramObj->description  = $description;
        $paramObj->template_id  = $template_id;
        $paramObj->active       = $active;

        $result = $this->repo->update($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\TemplateSliderController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template Slider updated ...'));
        }
        else{
            return redirect()->action('Backend\TemplateSliderController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template Slider did not update ...'));
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
            return redirect()->action('Backend\TemplateSliderController@index')
                ->withMessage(FormatGenerator::message('Success', 'Template TemplateSlider deleted ...'));
        }
        else{
            return redirect()->action('Backend\TemplateSliderController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Template TemplateSlider did not delete ...'));
        }
    }

    //entry form for adding image to slider
    public function addImage(){
        if (Auth::guard('User')->check()) {
            return view('backend.templatesliderdetail.templatesliderdetail');
        }
        return redirect('/');
    }

    //entry form for adding image to slider
    public function storeImage(){
        if (Auth::guard('User')->check()) {

            $table = (new TemplateSliderDetail())->getTable();

//        $request->validate();

            //Start Saving Image
            $removeImageFlag          = (Input::has('removeImageFlag')) ? Input::get('removeImageFlag') : 0;
            $path         = base_path().'/public/images/slider_images/';
            if(Input::hasFile('photo'))
            {
                $photo        = Input::file('photo');

                //$photo_name_original   = Utility::saveImage($photo,$path);
                $photo_name_original   = Utility::getImage($photo);
                $photo_ext   = Utility::getImageExt($photo);
                $photo_name = uniqid() . "." . $photo_ext;
                $image        = Utility::resizeImage($photo,$photo_name,$path);
            }
            else{
                $photo_name = "";
            }

            if($removeImageFlag == 1){
                $photo_name="";
            }
            //End Saving Image

            $name = Input::get('name');
            $description = Input::get('description');
            $paramObj                       = new TemplateSliderDetail();
            $paramObj->image_name           = Input::get('name');
            $paramObj->description          = Input::get('description');
            $paramObj->image_url            = "images/slider_images/".$photo_name;

            $result = $this->repo->create($paramObj);

            if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
                return redirect()->action('Backend\TemplateSliderController@index')
                    ->withMessage(FormatGenerator::message('Success', 'Image added ...'));
            }
            else{
                return redirect()->action('Backend\TemplateSliderController@index')
                    ->withMessage(FormatGenerator::message('Fail', 'Image did not add ...'));
            }
        }
        return redirect('/');
    }
}
