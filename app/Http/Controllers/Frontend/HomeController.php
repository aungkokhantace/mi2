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

        return view('frontend.home')->with('page',$page)->with('posts',$posts);
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

        return view('frontend.event.event_exhibitor_info')->with('page',$page)->with('posts',$posts);
    }

    public function conference()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);
        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts);
    }

    public function agenda()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);
        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts);
    }

    public function speakers()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);
        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts);
    }

    public function committees()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);
        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts);
    }

    public function secretariat()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);
        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts);
    }

    public function contactus()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);
        return view('frontend.event.event_conference_info')->with('page',$page)->with('posts',$posts);
    }

    public function other()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        return view('frontend.event.event_other_info')->with('page',$page)->with('posts',$posts);
    }

    public function local()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        return view('frontend.event.event_local_info')->with('page',$page)->with('posts',$posts);
    }

    public function visa()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        return view('frontend.event.event_visa_info')->with('page',$page)->with('posts',$posts);
    }

    public function housing()
    {
        $url = Route::getCurrentRoute()->getPath();

        $pageRepo = new PageRepository();
        $page_id  = $pageRepo->getPageIDByURL($url);

        $page = $pageRepo->getObjByID($page_id);

        $postRepo = new PostRepository();
        $posts    = $postRepo->getObjByPage($page_id);

        return view('frontend.event.event_housing_info')->with('page',$page)->with('posts',$posts);
    }

    public function comingsoon(Request $request)
    {
        return view('frontend.comingsoon');
    }
}
