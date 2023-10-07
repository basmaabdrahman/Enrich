@extends('layouts.master')
@section('title')
    New Course
@endsection
@section('content')
    <div >
        <div class="card">
            <div class="card-header">
                <h5 class="title">Update Courses</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{url('instructor')}}/{{$instructor['id']}}/" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Instructor Name</label>
                                <input type="text" class="form-control" placeholder="{{$instructor->name}}"  name="name" required>
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" placeholder="{{$instructor->email}}"  name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div >
                                <label>Instructor Image</label><br>
                                <input type="file"   value="upload image" name="img">
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>@endsection
