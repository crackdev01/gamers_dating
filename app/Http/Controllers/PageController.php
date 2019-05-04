<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Event;
use App\Game;
use App\User;
use App\personalpage;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function landingpage() {
        return view('landingpage');
    }

    public function home() {
        return view('homepage');
    }

    public function profilepage() {

        if (Personalpage::where("user_id",Auth::user()->id)->first()) {
            $personalpage = Personalpage::where("user_id",Auth::user()->id)->first();
        } else {
            $personalpage = new Personalpage();
            $personalpage->user_id = Auth::user()->id;
            $personalpage->save();
            $personalpage = Personalpage::where("user_id",Auth::user()->id)->first();  
         }
        //get filter results if available
        $filterResult = Personalpage::where("user_id", Auth::user()->id)->get();
        //get the favorite dates
        $user = User::find(Auth::user()->id);
        //dd(User::find(Auth::user()->id));
        $favorites =  User::find(Auth::user()->id)->dates()->get();
        $myselectedgames = User::find(Auth::user()->id)->games()->get();

         return view('profilepage', compact('personalpage','filterResult','favorites','myselectedgames'));
         //return view('profilepage', compact('personalpage'));

        
    }

    public function personalpage() {
        // $personalpage = Personalpage::findOrFail(Auth::user()->id->first());
        // $personalpage = Personalpage::findOrFail(1);
        $personalpage = Personalpage::where("user_id",Auth::user()->id)->first();
        
            // dd($personalpages);
       
        return view('personalpage', compact('personalpage'));
    }

    public function personaleditpage() {
        if (Personalpage::where("user_id",Auth::user()->id)->first()) {
            $personalpage = Personalpage::where("user_id",Auth::user()->id)->first();
        } else {
            $personalpage = new Personalpage();
            $personalpage->user_id = Auth::user()->id;
            $personalpage->save();
            $personalpage = Personalpage::where("user_id",Auth::user()->id)->first();  
         }
         
        $personalpage = Personalpage::where("user_id",Auth::user()->id)->first();
        $games = User::find(Auth::user()->id)->games()->get();
        // return view('personal_profile', compact('personalpage','games'));
        $check= true;
        // dd('edit profilepagescontroller');
        // return view('personalpages/edit', compact('personalpage'));
        return view('personal_profile', [
            'check' => $check,
            'personalpage' => $personalpage,
            'games' => $games
        ]);

    }

    public function chatpage() {
        return view('chatpage');
    }

    public function eventpage() {
        
        //$events = Event::all();
        $user = User::find(Auth::user()->id);
        $events = DB::table('events')->paginate(3);
        return view('eventpage', compact('events','user'));
        
    }

    public function adminpage() {
        return view('adminpage');
    }


} //end class
