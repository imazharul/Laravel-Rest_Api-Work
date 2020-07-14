<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\teacher;
//use DB;
class teacherController extends Controller
{
    
    public function index()
    {
        $tea=teacher::all();
    }

    public function store(Request $request)
    {
        
       $teacher=teacher::create($request->all());
       //return response()->json($teacher);
      return response('done');

    }

    
    public function show($id)
    {
        //
    }

    
    

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
