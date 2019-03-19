<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Event();
        $event->event_name = request('event_name');
        $event->event_description = request('event_description');
        $event->event_date = request('event_date');
        $event->event_time = request('event_time');
        $event->event_inschrijven_tm = request('event_inschrijven_tm');
        $event->event_image_url = request('event_image_url');
        $event->save();

        return redirect('/events');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Event $event)
    {
        
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
   
    public function update(Event $event)
    {
        $event->event_name = request('event_name');
        $event->event_description = request('event_description');
        $event->event_date = request('event_date');
        $event->event_time = request('event_time');
        $event->event_inschrijven_tm = request('event_inschrijven_tm');
        $event->event_image_url = request('event_image_url');
        $event->save();

        return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
   
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect('/events');
    }

    public function addEvent() {

        $user = User::find(1);
        $user->events()->attach(2);

        return dd('added my event');
    }

    public function deleteEvent() {

        $user = User::find(1);
        $user->events()->detach(2);

        return dd('removed myevent');
    }


} //end class
