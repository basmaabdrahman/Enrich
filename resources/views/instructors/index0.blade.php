@extends('layouts.master')
@section('title')
    Our Instructors
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h4 class="card-title">Our Instructors</h4>
                </div>
                <div class="card-body">
                    <div class="card-footer">
                        <a href="{{route('instructors.create')}}"><button type="submit" class="btn btn-fill btn-success" >Add Instructor</button></a>
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
                                    Image
                                </th>
                                <th>
                                    operations
                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($instructors as $prof)
                                <tr>
                                    <td>
                                        {{$prof->name}}
                                    </td>
                                    <td>
                                        {{$prof->email}}
                                    </td>
                                    <td>
                                       <img src="{{asset('storage/images/instructors/'.$prof->img)}}" width='50' height="50" class="img img-responsive">
                                    </td>
                                    <td>
                                        <div class="card-footer">
                                            <a href="{{url('instructor/edit')}}/{{$prof->id}}"><button type="submit" class="btn  btn-primary" >Update</button></a>
                                            <a href="{{url('instructors')}}/{{$prof->id}}"><button type="submit" class="btn  btn-danger" >Delete</button></a>

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
