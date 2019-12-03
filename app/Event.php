<?php
namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class Event extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
    static public function EventAdd($request)
    {
        if($request->event_id>0)
        {
            $Event = Event::find($request->event_id);
        }
        else
        {
            $Event = new Event();  
        } 
        $Event->vendor_id = Auth()->user()->id;
        $Event->event_name = $request->event_name;
        $Event->event_date = $request->event_date;
        $Event->event_time = $request->event_time;
        $Event->event_address = $request->event_address;
        $Event->event_description = $request->event_description;
        $Event->event_mobile = $request->event_mobile;
        $Event->event_website = $request->event_website;
        if($request->hasFile('event_logo'))
        {
            $file = $request->event_logo;
            $filename = time()."_".$file->getClientOriginalName();
            if($file->move(public_path().'/images/event_logo/', $filename))
            {
                $Event->event_logo = $filename;
            }
        }
        $Event->save();
        return $Event->id;
    }
    static public function GetAllEvents($ParaMeter)
    {
        $Event = Event::select('events.id');
        if(isset($ParaMeter['All']) && $ParaMeter['All']=="All")
        {
            $Event = $Event->addSelect("events.*");
        }
        else if(isset($ParaMeter['One']) && $ParaMeter['One']=="One")
        {
            $Event = $Event->addSelect("events.*")->limit(1)->orderBy("events.id","DESC");
        }
        $Event = $Event->get();
        return $Event;
    }
}