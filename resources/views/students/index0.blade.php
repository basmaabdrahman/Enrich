@extends('layouts.master')
@section('title')
Students
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Students</h4>
                </div>
                <div class="card-body">
                    <div class="card-footer">
                        <a href="{{route('students.create')}}"><button type="submit" class="btn btn-fill btn-success"  >Add Student</button></a>
                    </div>
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                            <tr>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    operations
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>
                                        {{$student->name}}
                                    </td>
                                    <td>
                                        {{$student->email}}
                                    </td>
                                    <td>
                                        {{$student->phone}}
                                    </td>
                                    <td>
                                        <img src="{{asset('storage/images/Students/'.$student->img)}}" width='50' height="50" class="img img-responsive">
                                    </td>
                                    <td>
                                        <div class="card-footer">
                                            <a href="{{url('student/edit')}}/{{$student->id}}"><button type="submit" class="btn  btn-primary" >Update</button></a>
                                            <a href="{{url('students')}}/{{$student->id}}"><button type="submit" class="btn  btn-danger" >Delete</button></a>

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
