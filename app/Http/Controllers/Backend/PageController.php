<?php
namespace App\Http\Controllers\Backend;

use App\Backend\Event\EventRepository;
use App\Backend\Infrastructure\Forms\PageEditRequest;
use App\Backend\Infrastructure\Forms\PageEntryRequest;
use App\Backend\Template\TemplateRepository;
use App\Core\User\UserRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Backend\Page\PageRepositoryInterface;
use App\Backend\Page\Page;
use App\Core\Permission\Permission;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Core\Permission\PermissionPage;

class PageController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function index(Request $request)
    {
        if (Auth::guard('User')->check()) {
            $pages      = $this->pageRepository->getPages();
            return view('backend.page.index')->with('pages', $pages);
        }
        return redirect('/login');
    }

    public function create(){
        if (Auth::guard('User')->check()) {
            $eventRepo      = new EventRepository();
            $events         = $eventRepo->getEvents();

            $templateRepo   = new TemplateRepository();
            $templates      = $templateRepo->getObjs();

            return view('backend.page.page')->with('events',$events)->with('templates',$templates);
        }
        return redirect('/login');
    }

    public function store(PageEntryRequest $request)
    {
        $request->validate();
        $name               = Input::get('name');
        $description        = Input::get('description');
        $content            = Input::get('content');
        $status             = Input::get('status');
        $url                = Input::get('url');
        $title              = Input::get('title');
        $page_menu_order    = Input::get('page_menu_order');
        $events_id          = Input::get('events_id');
        $templates_id       = Input::get('templates_id');

        $page = new Page();        
        $page->name             = $name;
        $page->description      = $description;
        $page->content          = $content;
         if ($status == "on") {
             $status = "Active";
        }else{
            $status = "Inactive";
        }
        $page->status           = $status;
        $page->url              = $url;
        $page->title            = $title;
        $page->page_menu_order  = $page_menu_order;
        $page->events_id        = $events_id;
        $page->templates_id     = $templates_id;

        $this->pageRepository->create($page);
        return redirect()->action('Backend\PageController@index');
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $pages = $this->pageRepository->getObjByID($id);

            $eventRepo      = new EventRepository();
            $events         = $eventRepo->getEvents();

            $templateRepo   = new TemplateRepository();
            $templates      = $templateRepo->getObjs();

            return view('backend.page.page')->with('pages', $pages)->with('events',$events)->with('templates',$templates);
        }
        return redirect('/login');
    }

    public function update(PageEditRequest $request){
        $id                 = Input::get('id');
        $name               = Input::get('name');
        $description        = Input::get('description');
        $content            = Input::get('content');
        $status             = Input::get('status');
        $url                = Input::get('url');
        $title              = Input::get('title');
        $page_menu_order    = Input::get('page_menu_order');
        $events_id          = Input::get('events_id');
        $templates_id       = Input::get('templates_id');

        $page = Page::find($id);
        $page->name             = $name;
        $page->description      = $description;
        $page->content          = $content;
        if ($status == "on") {
            $status = "Active";
        }else{
            $status = "Inactive";
        }
        $page->status           = $status;
        $page->url              = $url;
        $page->title            = $title;
        $page->page_menu_order  = $page_menu_order;
        $page->events_id        = $events_id;
        $page->templates_id     = $templates_id;

        $this->pageRepository->update($page);
        return redirect()->action('Backend\PageController@index');
    }

    public function destroy(){
        $id         = Input::get('selected_checkboxes');
        $new_string = explode(',', $id);
        foreach($new_string as $id){
            $this->pageRepository->delete($id);
        }
        return redirect()->action('Backend\PageController@index');
    }

}
