<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Personalpage;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\event;
use App\game;
use Illuminate\Support\Facades\DB;


class AjaxController extends Controller
{

    public function index(Request $request){

        //get user id
        $user = User::find(Auth::user()->id);
        //count mydates
        $count = $user->dates()->count();
        //set maxcount
        $maxCount = 5;
        if ($user->dates->contains($request->mydate)) {
                $user->dates()->detach($request->mydate);
        } else {
            if ($count<$maxCount) {    
            $user->dates()->attach($request->mydate);
        }
    }

        $mydates =  User::find(Auth::user()->id)->dates()->get();
        
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

    public function changePassword(Request $request) {

         $user_password = $request->old_password;

         $user = User::find(Auth::user()->id);

         $current_password = $user->password;

        if (Hash::check($user_password, $current_password))
        {
            $check = 'valid';

        } else {
            $check = 'unvalid';
            
        }

        $response = array(
            'status' => 'success',
            'msg' => $check,
        );

        echo json_encode($response);
        // return response()->json($response);
    }    

public function addevent(Request $request) {

        $event_id = $request->eventid;
        $user = User::find(Auth::user()->id);
        if ($user->events->contains($event_id)) {
            $user->events()->detach($event_id);
            $event_join = 'no';
        } else {
            $user->events()->attach($event_id);
            $event_join = 'yes';
        }
       
        $response = array(
            'status' => 'success',
            'msg' => $event_join,
        );

        return response()->json($response);
       
    }

public function getProfile(Request $request) {

    $mydate = $request->mydate;
    $personalpage = Personalpage::find($mydate);
    $date_user_id = $personalpage->user_id;
    //$user = User::find(Auth::user()->id);
    $nickname = User::find($date_user_id)->name;
    $user = User::find($date_user_id);
    $datergames = $user::find($user->id)->games()->get();
    $response = array(
        'status' => 'success',
        'msg' => $personalpage,
        'nickname' => $nickname,
        'datergames' => $datergames,
        'user' => $user,
    );

    return response()->json($response);
}    
  
public function liveSearch(Request $request) {
         
            $output = ''; 
            $total_row = 0;
            $query = $request->input('query');
            if($query != '') 
                { 
                $data = DB::table('games')->where('game_name', 'like', '%'.$query.'%')->take(5)->get();
            } else { 
                $data = DB::table('games')->where('game_name', '=', 'ddfgdfgs')->get(); 
                
            } 
            $total_row = $data->count(); 
                   
            $data = array(  'status' => 'success',
                            'result' => $data,
                            'total_data' => $total_row,
                        ); 

            return response()->json($data); 
    }

public function myGames(Request $request) {

    //get user id
    $user = User::find(Auth::user()->id);
    //count mydates
    $count = $user->games()->count();
    $mygame = $request->input('gameid');
    //set maxcount
    $maxCount = 5;
    if ($user->games->contains($mygame)) {
            $user->games()->detach($mygame);
    } else {
        if ($count<$maxCount) {    
        $user->games()->attach($mygame);
    }
}

    $mygames =  User::find(Auth::user()->id)->games()->get();
    
    $response = array(
        'status' => 'success',
        'result' => $mygames,
        'id' => $mygame,
    ); 
   
    return response()->json($response); 
}

} //end class




