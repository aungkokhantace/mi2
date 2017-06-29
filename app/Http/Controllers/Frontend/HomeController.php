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
use App\Backend\Page\PageRepository;
use App\Backend\Post\PostRepository;
use App\Backend\TemplateSlider\TemplateSliderRepository;
use App\Backend\TemplateSliderDetail\TemplateSliderDetailRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Redirect;

class HomeController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $url = Route::getCurrentRoute()->getPath();
        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

    //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
    //for slider view

        return view('frontend.home')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
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

    public function exhibitor()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_exhibitor_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function conference()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function agenda()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function speakers()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function committees()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function secretariat()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function contactus()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function other()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_other_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function local()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_local_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function visa()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_visa_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function housing()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_housing_info')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }

    public function comingsoon(Request $request)
    {
        return view('frontend.comingsoon');
    }

    public function tourpackage()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        //for slider view
        //get template of page
        $template_id = $page->templates_id;

        //get slider of template
        $templateSliderRepo = new TemplateSliderRepository();
        $slider = $templateSliderRepo->getObjByTemplateID($template_id);

        //get images of the slider
        $sliderdetailRepo = new TemplateSliderDetailRepository();
        $images      = $sliderdetailRepo->getObjsById($slider->id);
        $status = "active";
        //for slider view

        return view('frontend.event.event_tour_package')->with('page',$page)->with('posts',$posts)->with('images', $images)->with('$status', $status);
    }
}
