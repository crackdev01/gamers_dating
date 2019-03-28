<?php

namespace App\Http\Controllers;

use App\personalpage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class PersonalPagesController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $personalpages = Personalpage::all();



        return view('personalpages.index', compact('personalpages'));

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {

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
        $personalpage = new personalpage();
        $personalpage->user_id = Auth::user()->id;

        $personalpage->personal_firstname = request('personal_firstname');
        $personalpage->personal_lastname = request('personal_lastname');
        $personalpage->personal_nickname = request('personal_nickname');
        $personalpage->personal_gender = request('personal_gender');
        $personalpage->personal_age = request('personal_age');
        $personalpage->personal_location = request('personal_location');
        $personalpage->personal_image_url = request('personal_image_url');
        $personalpage->personal_food = request('personal_food');
        $personalpage->personal_info = request('personal_info');
        $personalpage->personal_status = '1'; 
        $personalpage->adminrights = 'user';
        $personalpage->save();

        return redirect('/personalpages');

    }



    /**

     * Display the specified resource.

     *

     * @param  \App\personalpage  $personalpage

     * @return \Illuminate\Http\Response

     */

    public function show(personalpage $personalpage)

    {

        return view('personalpages/show', compact('personalpage'));

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\personalpage  $personalpage

     * @return \Illuminate\Http\Response

     */

    public function edit(personalpage $personalpage)

    {

        return view('personalpages/edit', compact('personalpage'));

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\personalpage  $personalpage

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Personalpage $personalpage)
    {
        $personalpage->personal_firstname = request('personal_firstname');
        $personalpage->personal_lastname = request('personal_lastname');
        $personalpage->personal_nickname = request('personal_nickname');
        $personalpage->personal_gender = request('personal_gender');
        $personalpage->personal_age = request('personal_age');
        $personalpage->personal_location = request('personal_location');
        $personalpage->personal_image_url = request('personal_image_url');
        $personalpage->personal_food = request('personal_food');
        $personalpage->personal_info = request('personal_info');
        $personalpage->save();
        Auth::user()->name = request('user_nickname');
        Auth::user()->email = request('user_email');
        Auth::user()->save();

        return redirect('/profile');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\personalpage  $personalpage

     * @return \Illuminate\Http\Response

     */

    public function destroy(personalpage $personalpage)
    {
        $personalpage->delete();

        redirect('/personalpages');
    }


    public function addDate(Request $request, $id) {

        $user = User::find(Auth::user()->id);
        if ($user->dates()->contains($id)) {
            $user->dates()->detach($id);
        } else {
        $user->dates()->attach($id);
        }
        return redirect('/profile');
        }

} //end class