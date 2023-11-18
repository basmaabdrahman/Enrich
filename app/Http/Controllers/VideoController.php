<?php

namespace App\Http\Controllers;

use App\DataTables\VideoDataTable;
use App\Models\Video;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class VideoController extends Controller
{

    public function index(VideoDataTable $dataTable)
    {
        return $dataTable->render('videos.index');

    }
    public function getVideo(VideoDataTable $dataTable){
        return DataTables::of(Video::query())
            ->toJson();
    }


    public function create()
    {
        return view('videos.add-video');
    }


    public function store(Request $request)
    {

        $file_name=time().'.'.$request->file('video')->extension();
        $path=$request->file('video')->move(public_path('storage/videos/video'),$file_name);
        $image_name=time().'.'.$request->file('img')->extension();
        $image_path=$request->file('img')->move(public_path('storage/videos/images'),$image_name);
        Video::create([
            'name'=>$request->name,
            'image'=>$image_name,
            'video'=>$file_name,
        ]);
        return redirect('/videos');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $video=Video::find($id);
        return view('videos.update-video',compact('video'));
    }


    public function update(Request $request, $id)
    {
        $video=Video::find($id);
        $file_name=time().'.'.$request->file('video')->extension();
        $path=$request->file('video')->move(public_path('storage/videos/video'),$file_name);
        $image_name=time().'.'.$request->file('img')->extension();
        $image_path=$request->file('img')->move(public_path('storage/videos/images'),$image_name);
        $video->update([
            'name'=>$request->name,
            'img'=>$image_name,
            'video'=>$file_name,
        ]);
        return redirect('/');

    }


    public function destroy($id)
    {
        $video= Video::find($id);
        $video->delete();
        return redirect('/videos');
    }
}
