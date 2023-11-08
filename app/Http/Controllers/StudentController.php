<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class StudentController extends Controller
{


    public function index(StudentDataTable $dataTable)
    {
        return $dataTable->render('students.index');

    }
    public function getStudent(StudentDataTable $dataTable){
        return DataTables::of(Student::query())->make('true');
    }


    public function create()
    {
        return view('students.add-student');
    }


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


    public function show(Student $student)
    {
        //
    }


    public function edit($id)
    {
        $student=Student::find($id);
        return view('students.edit-student',compact('student'));

    }


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


    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect('students');
    }
}

