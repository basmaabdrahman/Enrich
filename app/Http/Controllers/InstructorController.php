<?php

namespace App\Http\Controllers;

use App\DataTables\InstructorDataTable;
use App\Http\Requests\StoreInstructorRequest;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\In;
use Yajra\DataTables\DataTables;

class InstructorController extends Controller
{

    public function index()
    {
        $instructors=Instructor::all();
        return view('instructors.index',compact('instructors'));
        //return $dataTable->render('instructors.index');

    }


    public function create()
    {
        return view('instructors.add-instructor');
    }

       public function store(StoreInstructorRequest $request)
       {
$validate=$request->validated();
            $teacher=Instructor::create([
                'name' => $request->username,
                'email' => $request->email,

            ]);
            $teacher->addMediaFromRequest('img')->withResponsiveImages()->toMediaCollection('instructors');
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
        if($request->hasFile('img')) {
            $instructor->addMediaFromRequest('img')->withResponsiveImages()->toMediaCollection('instructors');
            $instructor->update([
                'name' => $request['name'],
                'email' => $request['email'],
            ]);
        }
        return redirect('/instructors');
    }


    public function destroy($id)
    {
        $instructor=Instructor::find($id);
        $instructor->delete();
        return redirect('/instructors');
    }
}
