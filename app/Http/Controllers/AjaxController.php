<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Personalpage;

class AjaxController extends Controller
{

    public function index(Request $request){

        //get user id
        $user = User::find(Auth::user()->id);
        //count mydates
        $count = $user->dates()->count();
        //set maxcount
        $maxCount = 2;
        if ($user->dates->contains($request->mydate)) {
                $user->dates()->detach($request->mydate);
        } else {
            if ($count<$maxCount) {    
            $user->dates()->attach($request->mydate);
        }
    }

        $mydates =  $user::first()->dates()->get();
        
        $response = array(
            'status' => 'success',
            'msg' => $mydates,
        ); 
       
        return response()->json($response); 
     }

  
    public function findyourmatch(Request $request) {
        $gender = $request->gender; 
        $age = $request->age;
        $distance = $request->distance;
        $genre = $request->genre;

        // create age min and max
        $ageMin = $age-10;
        $ageMax = $age+10;
        $distanceMin = $distance-20;
        $distanceMax = $distance+20;

        // $filterResults = Personalpage::where('personal_gender', request('filter_gender'))->where('user_id', '!=', Auth::user()->id)->get();
        $filterResults = Personalpage::where('personal_gender', $gender)->where('user_id', '!=', Auth::user()->id)->
                        where('personal_age', '>=', $ageMin )->where('personal_age', '<=', $ageMax )->inRandomOrder(5)->get();


        //$user = User::find(Auth::user()->id);
        //$mydates =  $user::first()->dates()->get();
        $response = array(
            'status' => 'success',
            'msg' => $filterResults,
        );

        return response()->json($response);
    } 
  
} //end class



