<?php
namespace App\Http\Controllers\Backend;
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
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function EventAdd(Request $request)
    {
      if($request->isMethod('post')) 
       {
        $validationRule =
        [
          'event_name' => 'required',
          'event_date' => 'required',
          'event_time' => 'required', 
          'event_address' => 'required',
          'event_description' => 'required', 
          'event_mobile' => 'required', 
          'event_website' => 'required',
        ];
        if(!$request->hasfile('product_images'))
        {
          $validationRule['event_logo'] = 'required';
        }
        $validatedData = $request->validate($validationRule);
      }
      if($request->event_name!="")
      {
        try{
          Event::EventAdd($request);
          $Message = "Event added Successfully";
          $AlertClass = "alert-success";
        }
        catch (\Exception $e) {
          $Message = "Error in Event added ".$e->getMessage();
          $AlertClass = "alert-danger";
        }
        Session::flash('alert-class',$AlertClass);
        Session::flash('message', $Message);
        if($AlertClass=="alert-success")
        {
          return redirect('home');
        }
      }
      return view("Backend.Event.EventAdd");
    }
    public function EventAll()
    {
      $ParaMeter = array();
      $ParaMeter["All"]="All";
      $GetAllEvents = Event::GetAllEvents($ParaMeter);
      return view("Backend.Event.EventAll",compact("GetAllEvents"));
    }
}