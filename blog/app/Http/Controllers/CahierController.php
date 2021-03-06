<?php

namespace App\Http\Controllers;

use App\Cahier;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CahierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $cahier = new Cahier();
        $cahier->user_id = Auth::user()->id;
        $cahier->title = $request->title;
        $cahier->info = $request->info;
        $cahier->collab_email = $request->collab_email;
        $cahier->save();
        return redirect(url('/cahier/'.$cahier->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $cahier = Cahier::find($id);
        $pitchs = $cahier->pitchs();
        $cdc = $cahier->cdcs();
        $objectifs = $cahier->objectifs();


        return view('cahier.show')->with(compact('cahier', 'pitchs', 'cdc', 'objectifs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('hello edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {


        $cahier = new Cahier();
        $cahier->user_id = Auth::user()->id;
        $cahier->title = $request->title;
        $cahier->info = $request->info;
        $cahier->collab_email = $request->collab_email;
        $cahier->update();
        return redirect(url('/cahier/'.$cahier->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cahier = Cahier::find($id);
        $cahier->delete();
        return redirect((url('/home')));
    }

}
