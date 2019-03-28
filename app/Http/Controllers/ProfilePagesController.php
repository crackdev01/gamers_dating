<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use App\personalpage;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;

class ProfilePagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request, Personalpage $personalpage)

    {
            
          //dd(request(['filter_age', 'filter_genre', 'filter_gender', 'filter_distance' ]));  
          $filterResults = Personalpage::where('personal_gender', request('filter_gender'))->get();
          //dd( $resultsWithCorrectGender );
   
         
           // //dd(DB::table('personalpages')->where('personal_age', '>', 30)->count()-1);
           // $personalpages = DB::table('personalpages')->where('personal_age', '>', 30);
   
           // foreach ($personalpages as $personalpage) {
           // dd($personalpage->personal_page);
           // }
           return view('profilepage', [
               'personalpage' => $personalpage,
               'matches' => $filterResults
           ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()

    {
        dd('create');
        return view('personalpages.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)

    {
        dd('store');

        return redirect('/personalpages');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\personalpage  $personalpage
     * @return \Illuminate\Http\Response
     */

    public function show(Request $request)

    {
        //dd(request(['filter_age', 'filter_genre', 'filter_gender', 'filter_distance' ]));  
        $personalpage = Personalpage::where("user_id",Auth::user()->id)->first();  
        //$filterResults = Personalpage::where('personal_gender', request('filter_gender'))->get();
        $filterResults = Personalpage::where('personal_gender', request('filter_gender'))->where('user_id', '!=', Auth::user()->id)->get();

     
        //dd( $resultsWithCorrectGender );
        
        //dd($personalpage);
        //dd($resultsWithCorrectGender);
        

         return view('profilepage', compact('personalpage','filterResults'));
        //  [
            //  'personalpage' => $personalpage,
            //  'matches' => $resultsWithCorrectGender
            //  ]);

        //dd('show');

        //return view('personalpages/show', compact('personalpage'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\personalpage  $personalpage
     * @return \Illuminate\Http\Response
     */

    public function edit(personalpage $personalpage)

    {
        dd('edit');
        return view('personalpages/edit', compact('personalpage'));

    }

    /**

     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\personalpage  $personalpage
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, personalpage $personalpage)
    {
        dd('update');
        //dd(request(['filter_age', 'filter_genre', 'filter_gender', 'filter_distance' ]));  
        $resultsWithCorrectGender = Personalpage::where('personal_gender', request('filter_gender'))->get();
        
       // dd( $resultsWithCorrectGender );

      
        // //dd(DB::table('personalpages')->where('personal_age', '>', 30)->count()-1);
        // $personalpages = DB::table('personalpages')->where('personal_age', '>', 30);

        // foreach ($personalpages as $personalpage) {
        // dd($personalpage->personal_page);
        // }
        return view('profilepage', compact('personalpage'));
        //  [
        //     //'personalpage' => $personalpage,
        //     'matches' => $resultsWithCorrectGender
        // ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\personalpage  $personalpage
     * @return \Illuminate\Http\Response
     */

    public function destroy(personalpage $personalpage)

    {
        dd('destroy');
        $personalpage->delete();
        redirect('/personalpages');
    }

}