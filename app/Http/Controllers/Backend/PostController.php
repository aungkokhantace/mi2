<?php

namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\PostEditRequest;
use App\Backend\Infrastructure\Forms\PostEntryRequest;
use App\Backend\Page\PageRepository;
use App\Backend\Post\Post;
use App\Backend\Post\PostRepositoryInterface;
use App\Core\FormatGenerator;
use App\Core\ReturnMessage;
use DOMDocument;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    private $repo;

    public function __construct(PostRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        try{
            if (Auth::guard('User')->check()) {
                $posts      = $this->repo->getObjs();
                foreach($posts as $post){
                    if($post->status == "active"){
                        $post->status = "Active";
                    }
                    else{
                        $post->status = "Inactive";
                    }
                }
                return view('backend.post.index')->with('posts', $posts);
            }
            return redirect('/');
        }
        catch(\Exception $e){
            return redirect('/error/204/post');
        }
    }

    public function create(){
        if (Auth::guard('User')->check()) {
            $pageRepo = new PageRepository();
            $pages    = $pageRepo->getPages();
            return view('backend.post.post')->with('pages',$pages);
        }
        return redirect('/');
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(PostEntryRequest $request)
    {
        $table = (new Post())->getTable();

        $request->validate();
        $name               = Input::get('name');
        $description        = Input::get('description');
        $content            = Input::get('post_content');
        $status             = Input::get('status');
        $url                = Input::get('url');
        $title              = Input::get('title');
        $post_order         = Input::get('post_order');
        $pages_id           = Input::get('pages_id');

        $paramObj                   = new Post();
        $paramObj->name             = $name;
        $paramObj->description      = $description;
        $paramObj->content          = $content;
        if ($status == "on") {
            $status = "active";
        }else{
            $status = "inactive";
        }
        $paramObj->status           = $status;
        $paramObj->url              = $url;
        $paramObj->title            = $title;
        $paramObj->post_order       = $post_order;
        $paramObj->pages_id         = $pages_id;

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

        $paramObj->content = $dom->saveHTML();
        //End saving image */

        $result = $this->repo->create($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\PostController@index')
                ->withMessage(FormatGenerator::message('Success', 'Post created ...'));
        }
        else{
            return redirect()->action('Backend\PostController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Post did not create ...'));
        }
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $pageRepo = new PageRepository();
            $pages    = $pageRepo->getPages();

            $post = $this->repo->getObjByID($id);
            return view('backend.post.post')->with('post', $post)->with('pages', $pages);
        }
        return redirect('/');
    }

    public function update(PostEditRequest $request){
        $request->validate();

        $id = Input::get('id');
        $name               = Input::get('name');
        $description        = Input::get('description');
        $content            = Input::get('post_content');
        $status             = Input::get('status');
        $url                = Input::get('url');
        $title              = Input::get('title');
        $post_order         = Input::get('post_order');
        $pages_id           = Input::get('pages_id');

        $paramObj = Post::find($id);

        $paramObj->name             = $name;
        $paramObj->description      = $description;
        $paramObj->content          = $content;
        if ($status == "on") {
            $status = "active";
        }else{
            $status = "inactive";
        }
        $paramObj->status           = $status;
        $paramObj->url              = $url;
        $paramObj->title            = $title;
        $paramObj->post_order       = $post_order;
        $paramObj->pages_id         = $pages_id;

//         //start saving image
//        $dom = new DomDocument();
//
//        if(isset($detail) && $detail != ""){
//            $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
//
//            $images = $dom->getElementsByTagName('img');
//
//            // foreach <img> in the submitted message
//            foreach($images as $img){
//                $src = $img->getAttribute('src');
//
//                // if the img source is 'data-url'
//                if(preg_match('/data:image/', $src)){
//
//                    // get the mimetype
//                    preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
//                    $mimetype = $groups['mime'];
//
//                    // Generating a random filename
//                    $filename = uniqid();
//                    $filepath = "/images/$filename.$mimetype";
//
//                    // @see http://image.intervention.io/api/
//                    $image = Image::make($src)
//                        // resize if required
//                        /* ->resize(300, 200) */
//                        ->encode($mimetype, 100) 	// encode file to the specified mimetype
//                        ->save(public_path($filepath));
//
//                    $new_src = asset($filepath);
//                    $img->removeAttribute('src');
//                    $img->setAttribute('src', $new_src);
//
//                } // <!--endif
//            } // <!--endforeach
//        }
//
//        $paramObj->detail = $dom->saveHTML();
//        //End saving image
        $result = $this->repo->update($paramObj);

        if($result['aceplusStatusCode'] ==  ReturnMessage::OK){
            return redirect()->action('Backend\PostController@index')
                ->withMessage(FormatGenerator::message('Success', 'Post updated ...'));
        }
        else{
            return redirect()->action('Backend\PostController@index')
                ->withMessage(FormatGenerator::message('Fail', 'Post did not update ...'));
        }

    }

    public function destroy(){
        $id         = Input::get('selected_checkboxes');
        $new_string = explode(',', $id);
        foreach($new_string as $id){
            $this->repo->delete($id);
        }

        return redirect()->action('Backend\PostController@index')
            ->withMessage(FormatGenerator::message('Success', 'Post deleted ...'));

    }

    public function page()
    {
        $posts= DB::select('SELECT * FROM posts WHERE page_id = 1 ORDER BY created_at DESC');

        /*foreach($posts as $post){
            $html = htmlentities($post->detail);
            $html_decode = html_entity_decode($html);
            dd('html_decode',$post->detail);
        }*/
        return view('backend.page.page')->with('posts',$posts);
    }
}
