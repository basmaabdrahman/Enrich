
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
            @can('Add-Student')
            <div class="card-footer">
                <a href="{{url('students/create')}}" class="btn btn-fill btn-success"  >Add Student</a>
            </div>
            @endcan
             <div class="table-responsive">
                                <table class="table tablesorter " id="">
                                  <thead class=" text-primary">
                                                      <tr>
                                                      <th>
                                                                                                                ID
                                                                                                              </th>
                                                        <th>
                                                          Name
                                                        </th>
                                                        <th>
                                                          Email
                                                        </th>
                                                        <th>
                                                          Phone
                                                        </th>
                                                        <th class="text-center">
                                                          Image
                                                        </th>
                                                        <th class="text-center">
                                                              Operation
                                                           </th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($students as $student)
                                                                          <tr>
                                                                           <td>
                                                                              {{$student->id}}
                                                                               </td>
                                                                            <td>
                                                                              {{$student->name}}
                                                                            </td>
                                                                            <td>
                                                                             {{$student->email}}
                                                                            </td>
                                                                            <td>
                                                                              {{$student->phone}}
                                                                            </td>
                                                                            <td class="center-text">
                                                                              <img class="photo" src="{{$student->getFirstMedia('students')->getUrl('thumb')}}"/>
                                                                            </td>
                                                                            @can('edit-deleteStudent')
                                                                            <td>
                                                                           <a href="{{url('students/'.$student->id.'/edit/')}}"class="btn btn-fill btn-primary"  >Edit</a>
                                                                            <a href="{{url('student/'.$student['id'])}}"class="btn btn-fill btn-danger"  >Delete</a>

                                                                            </td>
                                                                            @endcan
                                                                          </tr>
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
            </div>
        </div>
    </div>
    </div>
@endsection


