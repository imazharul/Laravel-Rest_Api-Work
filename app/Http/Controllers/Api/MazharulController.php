<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\mazharul;
class MazharulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mazharul=mazharul::all();
        return response()->json($mazharul);
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
        $validatedData = $request->validate([
            'mazharul_id' => 'required',
            'mazharul_name' => 'required|unique:mazharuls|max:25',
            'mazharul_code' => 'required|unique:mazharuls|max:25',
        ]);

        $maz=mazharul::create($request->all());
        //return response()->json($maz);
        return response('done..');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $mazh=mazharul::findorfail($id);
        return response()->json($mazh);
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
        $validatedData = $request->validate([
            'mazharul_id' => 'required',
            'mazharul_name' => 'required|unique:mazharuls|max:25',
            'mazharul_code' => 'required|unique:mazharuls|max:25',
        ]);
        $mazharul=mazharul::findorfail($id);
        $mazharul->update($request->all());
        return response('Data updated..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        mazharul::where('id',$id)->delete();
        return response('Deleted done..');
    }
}
