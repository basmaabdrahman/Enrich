@extends('layouts.master')
@section('title')
Edit information
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
                <h5 class="title">Edit Student's Data</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{url('student')}}/{{$student['id']}}/" enctype="multipart/form-data">
                    @csrf
                    <div class="row">

                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">student Name</label>
                                <input type="text" class="form-control" placeholder="{{$student->name}}"  name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" placeholder="{{$student->email}}"  name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile Phone</label>
                                <input type="text" class="form-control" placeholder="{{$student->phone}}"  name="phone" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div >

                                <label>Student Image</label><br>
                                <img class="photo" alt="student Photo" src="{{$student->getFirstMediaUrl()}}" />
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
