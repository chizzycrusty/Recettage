<?php

namespace App\Http\Controllers;

use App\CDC;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CDCController extends Controller
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

        $file = Input::file('cdc');
        $destinationPath = 'temp'; // upload path
        $extension = $file->getClientOriginalExtension(); // getting image extension
        $fileName = rand(11111,99999).'.'.$extension; // renameing image
        $file->move($destinationPath, $fileName); // uploading file to given path
        DB::table('cdcs')->insert(
            ['cahier_id' => $request->cahier_id, 'name' => $fileName, 'filelocation'=>$destinationPath.'/'.$fileName]
        );

        return redirect(url('/cahier/'.$request->cahier_id));
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
        $cdc = new Cdc();
        $cdc->cahier_id = $request->cahier_id;
        $cdc->name = $request->name;
        $cdc->filelocation = $request->filelocation;
        $cdc->update();
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
        $cdc = Cdc::find($id);
        $cdc->delete();
        return redirect((url('/home')));
    }
}
