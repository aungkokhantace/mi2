<?php
namespace App\Http\Controllers\Backend;

use App\Backend\Infrastructure\Forms\EventEditFormRequest;
use App\Backend\Infrastructure\Forms\EventEntryFormRequest;
use App\Backend\Event\AppEvent;
use App\Backend\Permission\Permission;
use App\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Backend\Event\EventRepositoryInterface;
use Illuminate\Support\Facades\Input;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Backend\Event\Event;
use Carbon\Carbon;
use App\Backend\Event\EventRepository;
use App\Backend\Infrastructure\Forms\EventEntryRequest;
use App\Backend\Infrastructure\Forms\EventEditRequest;

class EventController extends Controller
{   

    public function __construct()
    {        
    }

  public function index(Request $request)
    {
        if (Auth::guard('User')->check()) {

            $eventRepo = new EventRepository();
            $events      = $eventRepo->getevents();
            return view('backend.event.index')->with('events', $events);
          }
        return redirect('backend/login');
    }

     public function create(){
        if (Auth::guard('User')->check()) {
            return view('backend.event.event');
        }
        return redirect('/login');
    }

    public function store(EventEntryRequest $request)
    {
        $request->validate();
        $name           = Input::get('name');
        $description    = Input::get('description');
        $status         = Input::get('status');
        $url         = Input::get('url');
        $title         = Input::get('title');

        $event = new Event();
        $event->name = $name;
        $event->description = $description;
        $event->status = $status;
        $event->url = $url;
        $event->title = $title;

        $eventRepo = new EventRepository();
        $eventRepo->create($event);
        return redirect()->action('Backend\EventController@index');
    }

    public function edit($id){
        if (Auth::guard('User')->check()) {
            $eventRepo = new EventRepository();
            $event      = $eventRepo->getObjByID($id);
            return view('backend.event.event')->with('event', $event);
        }
        return redirect('/login');
    }

     public function update(EventEditRequest $request){
        $id             = Input::get('id');
        $name           = Input::get('name');
        $description    = Input::get('description');
        $status         = Input::get('status');
        $url            = Input::get('url');
        $title          = Input::get('title');

        $event = Event::find($id);
        $event->name = $name;
        $event->description = $description;
        $event->status = $status;
        $event->url = $url;
        $event->title = $title;

        $eventRepo = new EventRepository();
        $eventRepo->update($event);
        return redirect()->action('Backend\EventController@index');
    }

     public function destroy(){
        $id         = Input::get('selected_checkboxes');
        $new_string = explode(',', $id);
        foreach($new_string as $id){
            $eventRepo = new EventRepository();
            $eventRepo->delete_events($id);
        }
        return redirect()->action('Backend\EventController@index');
    }
   
}
