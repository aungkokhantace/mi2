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
use DOMDocument;
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
            foreach($pages as $page){
                if($page->allow_edit == 1){
                    $page->allow_edit = "Yes";
                }
                else{
                    $page->allow_edit = "No";
                }
            }
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
        $allow_edit         = Input::get('allow_edit');

        $page = new Page();        
        $page->name             = $name;
        $page->description      = $description;
        $page->content          = $content;
         if ($status == "on") {
             $status = "active";
        }else{
            $status = "inactive";
        }
        $page->status           = $status;
        $page->url              = $url;
        $page->title            = $title;
        $page->page_menu_order  = $page_menu_order;
        $page->events_id        = $events_id;
        $page->templates_id     = $templates_id;
        if ($allow_edit == "on") {
            $allow_edit = 1;
        }else{
            $allow_edit = 0;
        }
        $page->allow_edit     = $allow_edit;

        //start saving image
        $dom = new DomDocument();

        if(isset($content) && $content != ""){
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = $dom->getElementsByTagName('img');

            // foreach <img> in the submitted message
            foreach($images as $img){
                $src = $img->getAttribute('src');

                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){

                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    // Generating a random filename
                    $filename = uniqid();
                    $filepath = "/images/$filename.$mimetype";

                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                        // resize if required
                        //->resize(300, 200)
                        ->encode($mimetype, 100) 	// encode file to the specified mimetype
                        ->save(public_path($filepath));

                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);

                } // <!--endif
            } // <!--endforeach
        }

        $page->content = $dom->saveHTML();
        //End saving image

        $this->pageRepository->create($page);
        return redirect()->action('Backend\PageController@index');
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $pages = $this->pageRepository->getObjByID($id);
//            if($pages->allow_edit == 1){
                $eventRepo      = new EventRepository();
                $events         = $eventRepo->getEvents();

                $templateRepo   = new TemplateRepository();
                $templates      = $templateRepo->getObjs();
                return view('backend.page.page')->with('pages', $pages)->with('events',$events)->with('templates',$templates);
//            }
//            else{
//                alert()->warning('This page cannot be edited. ')->persistent('OK');
//                return redirect()->action('Backend\PageController@index');
//            }
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
        $allow_edit         = Input::get('allow_edit');

        $page = Page::find($id);
        $original_content       = $page->content;
        $original_allow_edit    = $page->allow_edit;

            $page->name             = $name;
            $page->description      = $description;
            $page->content          = $content;
            if ($status == "on") {
                $status = "active";
            }else{
                $status = "inactive";
            }
            $page->status           = $status;
            $page->url              = $url;
            $page->title            = $title;
            $page->page_menu_order  = $page_menu_order;
            $page->events_id        = $events_id;
            $page->templates_id     = $templates_id;
            if ($allow_edit == "on") {
                $allow_edit = 1;
            }else{
                $allow_edit = 0;
            }
            $page->allow_edit     = $allow_edit;

       /* //start saving image
        $dom = new DomDocument();

        if(isset($content) && $content != ""){
            $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

            $images = $dom->getElementsByTagName('img');

            // foreach <img> in the submitted message
            foreach($images as $img){
                $src = $img->getAttribute('src');

                // if the img source is 'data-url'
                if(preg_match('/data:image/', $src)){

                    // get the mimetype
                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
                    $mimetype = $groups['mime'];

                    // Generating a random filename
                    $filename = uniqid();
                    $filepath = "/images/$filename.$mimetype";

                    // @see http://image.intervention.io/api/
                    $image = Image::make($src)
                        // resize if required
                        //->resize(300, 200)
                        ->encode($mimetype, 100) 	// encode file to the specified mimetype
                        ->save(public_path($filepath));

                    $new_src = asset($filepath);
                    $img->removeAttribute('src');
                    $img->setAttribute('src', $new_src);

                } // <!--endif
            } // <!--endforeach
        }

        $page->content = $dom->saveHTML();
        //End saving image  */

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
