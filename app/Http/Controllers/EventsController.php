<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$events = Event::all()->paginate(3);
        $events = DB::table('events')->paginate(10);
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

    public function addEvent(Request $request, $id) {

        $user = User::find(Auth::user()->id);
        if ($user->events->contains($id)) {
            $user->events()->detach($id);
        } else {
        $user->events()->attach($id);
        $events->id->event_count = 1;
        }
        return redirect('event');
        }

   


} //end class
