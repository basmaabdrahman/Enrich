@extends('layouts.master')
@section('title')
    Our Courses
@endsection
@section('content')


    @if (session()->has('ADD'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('ADD') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('update'))
        <div class="alert alert-light alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('update') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session()->get('delete') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Our Courses</h4>
                </div>
                <div class="card-body">
                    <div class="card-footer">
                        <a href="{{url('courses/create')}}" class="btn btn-fill btn-success" >New Course</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Content
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    operations
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                            <tr>
                                <td>
                                   {{$course->name}}
                                </td>
                                <td>
                                    {{$course->content}}
                                </td>
                                <td>
                                    {{$course->price}}
                                </td>
                                <td>
                                    <div class="card-footer">
                                        <a href="{{url('courses')}}/{{$course->id}}/edit" class="btn  btn-primary" >Update</a>

                                        <a href="{{url('course')}}/{{$course->id}}"class="btn  btn-danger" method='delete'>Delete</a>

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