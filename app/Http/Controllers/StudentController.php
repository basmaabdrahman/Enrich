<?php

namespace App\Http\Controllers;

use App\DataTables\StudentDataTable;
use App\Http\Requests\StoreStudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\MediaStream;
use Yajra\DataTables\DataTables;


class StudentController extends Controller
{


    public function index()
    {
        $students=Student::all();
        return view('students.index',compact('students'));
        //return $dataTable->render('students.index');

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

            $student=Student::create([
                'name'=>$request['name'],
                'email'=>$request['email'],
                'phone'=>$request['phone'],
            ]);
            if ($request->hasFile('img')) {
                $student->addMediaFromRequest('img')->withResponsiveImages()
                    ->ToMediaCollection('students');
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
        if ($request->hasFile('img')){
           //$student->clearMediaCollection('students');
           $student->addMediaFromRequest('img')->withResponsiveImages()
               ->ToMediaCollection('students');
            $student->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);
        }
        else{
            return false;
        }
        return redirect('/students');
    }


    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        return redirect('students');
    }
    public function download($id){
        $student=Student::find($id);
        $media=$student->getFirstMedia('students');
        return $media;
    }
    public function downloads(){
        //$media=Media::where('collection_name','=','students')->get();
        return MediaStream::create('downloads.zip')->addMedia(Media::all());
    }
    public function re_img($id){
        $student=Student::find($id);
        return view('students.show',compact('student'));
    }
}

