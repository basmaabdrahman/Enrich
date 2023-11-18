
@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Users</div>
            <div class="card-body">
            <div class="card-footer">
                <a href="{{url('instructors/create')}}" class="btn btn-fill btn-success"  >Add Instructor</a>
            </div>
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
                                                    @foreach($instructors as $instructor)
                                                                          <tr>
                                                                           <td>
                                                                              {{$instructor->id}}
                                                                               </td>
                                                                            <td>
                                                                              {{$instructor->name}}
                                                                            </td>
                                                                            <td>
                                                                             {{$instructor->email}}
                                                                            </td>
                                                                            <td>
                                                                              {{$instructor->phone}}
                                                                            </td>
                                                                            <td class="center-text">
                                                                              <img class="photo" src="{{$instructor->getFirstMediaUrl('instructors')}}"/>
                                                                            </td>
                                                                            <td>
                                                                           <a href="{{url('instructors/'.$instructor->id.'/edit/')}}"class="btn btn-fill btn-primary"  >Edit</a>
                                                                            <a href="{{url('instructor/'.$instructor['id'])}}"class="btn btn-fill btn-danger"  >Delete</a>

                                                                            </td>
                                                                          </tr>
                                                                          @endforeach
                                                                        </tbody>
                                                                      </table>
            </div>
        </div>
    </div>
    </div>
@endsection


