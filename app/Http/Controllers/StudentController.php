<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;



class StudentController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();
        return view('students.index0',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.add-student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        $validated=$request->validated();
        if($request->hasFile('img')){
            $file_name=time().'.'.$request->img->extension();
            $path=$request['img']->move(public_path('storage/images/Students'),$file_name);
            Student::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],
                'img'=>$file_name,
            ]);
        }
        else{
            return view('students.add-student');
        }
        return redirect('/students');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view('students.edit-student',compact('student'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StoreStudentRequest $request)
    {
        $id=$request->id;
        $student=Student::find($id);
        if($request->hasFile('img')){
            $file_name=time().'.'.$request->img->extension();
            $path=$request->file('img')->move(public_path('storage/images/Students'),$file_name);
            $student->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'img'=>$file_name,
            ]);
        }
        else{
            return view('students.edit-student',compact('student'));
        }
        return redirect('/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect('students');
    }
}

