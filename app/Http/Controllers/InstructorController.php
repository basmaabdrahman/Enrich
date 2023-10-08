<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstructorRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;

class InstructorController extends Controller
{

    public function index()
    {
        $instructors=Instructor::all();
        return view('instructors.index',compact('instructors'));
    }


    public function create()
    {
        return view('instructors.add-instructor');
    }

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



    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $instructor=Instructor::find($id);
        return view('instructors.update-instructor',['instructor'=>$instructor]);
    }


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


    public function destroy($id)
    {
        $instructor=Instructor::find($id);
        $instructor->delete();
        return redirect('/instructors');
    }
}
