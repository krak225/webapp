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
            $enddate = $row->event_date_end."24:00:00"; 
            $event[] = Calendar::event(
                        $row->event_title,
                        true,
                        new \DateTime($row->event_date_start),
                        new \DateTime($row->event_date_end),
                        $row->event_id,
                        [
                            'color' => $row->event_color,
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function Affiche()
    {
        return view('event.addevent');
    }



    public function SaveEvent(Request $request)
    {
          $this->validate($request,[
            
            'event_title' => 'required',
            'event_date_start' => 'required',
            'event_date_end' => 'required',
            'event_color' => 'required',
        ]);

        $event = new Event();

        $event->event_title        =  $request->input('event_title');
        $event->event_date_start   =  $request->input('event_date_start');
        $event->event_date_end     =  $request->input('event_date_end');
        $event->event_color        =  $request->input('event_color');
        $event->event_date_creation   = gmdate('Y-m-d H:i:s');

        $event->save();

        return redirect()->route('events')->with('message', 'Evènement ajouter');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
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
