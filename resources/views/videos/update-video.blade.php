@extends('layouts.master')
@section('title')
Edit video
@endsection
@section('content')
    @section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div >
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Edit video</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{url('videos')}}/{{$video['id']}}/" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-4 pl-md-1">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">student Name</label>
                                    <input type="text" class="form-control" placeholder="{{$video->name}}"  name="name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div >
                                    <label>Video Image</label><br>
                                    <input type="file"   value="upload image" name="img">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div >
                                    <label>Video </label><br>
                                    <input type="file"   name="video">
                                </div>
                            </div>
                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-fill btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>@endsection
