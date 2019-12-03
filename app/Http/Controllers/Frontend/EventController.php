<?php
namespace App\Http\Controllers\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Event;
use App\Services\PayUService\Exception;
use Session;
class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function EventAll()
    {
      $ParaMeter = array();
      $ParaMeter["All"]="All";
      $GetAllEvents = Event::GetAllEvents($ParaMeter);
      return view("Frontend.Event.EventAll",compact("GetAllEvents"));
    }
}