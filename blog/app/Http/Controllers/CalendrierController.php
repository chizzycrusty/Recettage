<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CalendrierController extends Controller
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
        $calendrier = new Calendrier();
        $calendrier->cahier_id = $request->cahier_id;
        $calendrier->name = $request->name;
        $calendrier->filelocation = $request->filelocation;
        $calendrier->save();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $calendrier = new Calendrier();
        $calendrier->cahier_id = $request->cahier_id;
        $calendrier->name = $request->name;
        $calendrier->filelocation = $request->filelocation;
        $calendrier->update();
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
        $calendrier = Calendrier::find($id);
        $calendrier->delete();
        return redirect((url('/home')));
    }
}
