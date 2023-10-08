@extends('layouts.master')
@section('title')
    Videos
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Videos</h4>
                </div>
                <div class="card-body">
                    <div class="card-footer">
                        <a href="{{url('/video/create')}}" class="btn btn-fill btn-success">  Add Video</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>

                                <th>
                                    Image
                                </th>
                                <th>
                                    Video
                                </th>

                                <th>
                                    operations
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($videos as $video)
                                <tr>
                                    <td>
                                        {{$video->name}}
                                    </td>


                                    <td>
                                        <img src="{{asset('storage/videos/images/'.$video->img)}}" width='50' height="50" class="img img-responsive">
                                    </td>
                                    <td>
                                        <video src="{{asset('storage/videos/video/'.$video->video)}}" width='50' height="50" class="img img-responsive" autoplay></video>
                                    </td>
                                    <td>
                                        <div class="card-footer">
                                            <a href="{{url('/videos')}}/{{$video->id}}/edit"  class="btn  btn-primary" >Update</a>
                                            <a href="{{url('/video')}}/{{$video->id}}" class="btn  btn-danger">Delete</a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
