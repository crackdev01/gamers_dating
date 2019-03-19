<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Game;
use App\personalpage;

class PageController extends Controller
{
    public function landingpage() {
        return view('landingpage');
    }

    public function home() {
        return view('homepage');
    }

    public function profilepage() {
        return view('profilepage');
    }

    public function personalpage() {
        // $personalpage = Personalpage::findOrFail(Auth::user()->id);
        // $personalpage = Personalpage::findOrFail(1);
        $personalpage = Personalpage::where("user_id",Auth::user()->id)->first();
        
            // dd($personalpages);
                
       
        return view('personalpage', compact('personalpage'));
    }

    public function chatpage() {
        return view('chatpage');
    }

    public function eventpage() {
        
        $events = Event::all();
        return view('eventpage', compact('events'));
        
    }

    public function adminpage() {
        return view('adminpage');
    }


} //end class
