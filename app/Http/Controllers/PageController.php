<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function landingpage() {
        return view('landingpage');
    }

    public function home() {
        return view('home');
    }

    public function profilepage() {
        return view('profilepage');
    }

    public function personalpage() {
        return view('personalpage');
    }

    public function chatpage() {
        return view('chatpage');
    }

    public function eventpage() {
        return view('eventpage');
    }

    public function adminpage() {
        return view('adminpage');
    }


} //end class
