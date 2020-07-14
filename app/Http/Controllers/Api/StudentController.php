<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB; //use database db
use App\Model\student; // use Model class
use Illuminate\Support\Facades\Hash; // its use for password hash

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=DB::table('students')->get(); //Quary buldeer
        //$student=student::all(); // eloqment
        return response()->json($student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['student_id']=$request->student_id;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['image']=$request->image;
        $data['gender']=$request->gender;

        $insert=DB::table('students')->insert($data); //Quary velder
        return response('inserted data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$student=DB::tabel('students')->where('id',$id)->first(); // use Quary bulder
        //$student=student::findorfail($id);
        //return response()->json($student);
        $student=student::findorfail($id);
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $data=array();
        $data['student_id']=$request->student_id;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['image']=$request->image;
        $data['gender']=$request->gender;

        DB::table('students')->where('id',$id)->update($data); //Quary velder
        return response('update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $img=DB::tabel('students')->where('id',$id)->first(); //get the data
        $img_path=$img->image; //get only images
        unlink($img_path); //images delete from folder
        DB::table('students')->where('id',$id)->delete();
        
        return response('deleted'); //response
    }
}
