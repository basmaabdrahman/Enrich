@extends('layouts.master')
@section('title')
    New Course
@endsection
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
                <h5 class="title">Add Courses</h5>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('courses.store')}}">
                    @csrf
                    <div class="row">

                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Course Name</label>
                                <input type="text" class="form-control" placeholder="Course name"  name="name" required>
                            </div>
                        </div>
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price</label>
                                <input type="number" class="form-control" placeholder="250$" step="250" min="250" name="price" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 px-md-1">
                            <div class="form-group">
                                <label>Course Content</label>
                                <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" name="content">   </textarea>                      </div>
                        </div>
                    </div>


            <div class="card-footer">
                <button type="submit" class="btn btn-fill btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>@endsection
