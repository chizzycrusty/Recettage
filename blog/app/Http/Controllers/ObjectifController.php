<?php

namespace App\Http\Controllers;

use App\Objectif;
use Illuminate\Http\Request;

use App\Http\Requests;

class ObjectifController extends Controller
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

        $array = $request->json()->all();
        $objectif = new Objectif();
        $objectif->cahier_id = $array['cahier_id'];
        $objectif->content = $array['content'];
        $objectif->save();

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
    public function update(Request $request)
    {
        $array = $request->json()->all();

        $objectif = Objectif::find(intval($array['obj_id']));

        $objectif->content = $array['content'];

        $objectif->update();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objectif = Objectif::find($id);
        $objectif->delete();
        return redirect((url('/home')));
    }

    public function last(){
        $pitch = Objectif::orderby('id', 'desc')->first();
        return $pitch->toJson();
    }
}
