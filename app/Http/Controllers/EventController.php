<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('fr');
    }
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function events()
    {
        $event = Event::all();
        $event = [];
        
        foreach ($event as $row ) {
            // $enddate = $row->end_date."24:00:00"; 
            $event[] = Calendar::event(
                        $row->title,
                        false,
                        new \DateTime($row->start_date),
                        new \DateTime($row->end_date),
                        $row->id,
                        [
                            'color' => $row->color,
                        ]
                );
                
        } 
        $calendar = Calendar::addEvents($event);
        return view('event.events', compact('event', 'calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AddEvent()
    {
        return view('event.addevent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function SaveEvent(Request $request)
    {
          $this->validate($request,[
            
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
        ]);

        $event = new Event();

        $event->title                      =  $request->input('title');
        $event->start_date                 =  $request->input('start_date');
        $event->end_date                   =  $request->input('end_date');
        $event->color                      =  $request->input('color');
        $event->event_date_creation        = gmdate('Y-m-d H:i:s');
        $event->save();

        return redirect()->route('events')->with('message', 'Evènement ajouter');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function ShowEvent()
    {   
          $event = Event::all();
            return view('event.display', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function EditEvent(Event $event)
    {
        $event = Event::find($event->id);
        return view('event.editevent', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function UpdateEvent(Request $request, $id)
    {
        $this->validate($request,[
            
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'color' => 'required',
        ]);

        $event = Event::find($id);

        $event->title                          =  $request->input('title');
        $event->start_date                     =  $request->input('start_date');
        $event->end_date                       =  $request->input('end_date');
        $event->color                          =  $request->input('color');
        $event->event_date_modification        = gmdate('Y-m-d H:i:s');
        $event->save();
        // echo '<script> alert("Donée Enregistrer") </script>';
        return redirect()->route('events ')->with('message', 'Evènement mise à jour');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
