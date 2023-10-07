<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstructorRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors=Instructor::all();
        return view('instructors.index0',compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructors.add-instructor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $file_name=time().'.'.$request->file('img')->extension();
        $path=$request->file('img')->move(public_path('storage/images/instructors'),$file_name);


            Instructor::create([
                'name' => $request->username,
                'email' => $request->email,
                'img'=>$file_name,
            ]);
            return redirect('/instructors');

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
        $instructor=Instructor::find($id);
        return view('instructors.update-instructor',['instructor'=>$instructor]);
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
        $instructor=Instructor::find($id);
        $file_name=time().'.'.$request->file('img')->extension();
        $path=$request->file('img')->move(public_path('storage/images/instructors'),$file_name);
        $instructor->update([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'img'=>$file_name
        ]);
        return redirect('/instructors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor=Instructor::find($id);
        $instructor->delete();
        return redirect('/instructors');
    }
}
