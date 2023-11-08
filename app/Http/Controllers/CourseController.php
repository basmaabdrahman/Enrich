<?php

namespace App\Http\Controllers;

use App\DataTables\courseDataTable;
use App\Http\Requests\StoreCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CourseController extends Controller
{
    public function index(CourseDataTable $dataTable)
    {
        return $dataTable->render('courses.index');

    }
    public function getcourse(courseDataTable $dataTable){
        return DataTables::of(Course::query())->make('true');
    }

    public function create()
    {
        return view('courses.add-course');
    }


    public function store(StoreCourseRequest $request)
    {
        $validated = $request->validated();

        Course::create([
            'name'=>$request['name'],
            'content'=>$request['content'],
            'price'=>$request['price'],
        ]);
        session()->flash('ADD','New Course has been added');
        return redirect('/courses');


    }

    public function show($id)
    {


    }


    public function edit($id)
    {
        $course=Course::find($id);

        return view('courses.update-course',['course'=>$course]);
    }


    public function update(Request $request, $id)
    {
         $course=Course::find($id);
         $course->update([
             'name'=>$request['name'],
             'content'=>$request['content'],
             'price'=>$request['price']
         ]);
        session()->flash('update','Current Course has been updated');

        return redirect('/courses');
    }


    public function destroy($id)
    {
        $course=Course::find($id);
        $course->delete();

        session()->flash('delete','Deletion Done');
        return redirect('/courses');
    }
}
