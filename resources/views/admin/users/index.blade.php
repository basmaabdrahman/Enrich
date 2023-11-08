@extends("layouts.admin")
@section('content')

    <div class="col-md-12">
        <div class="card  card-plain">
            <div class="card-body">
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
                            <th >
                                Operations
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->name}}
                            </td>
                             <td>
                                                            {{$user->email}}
                                                        </td>
                            <td class="flex space-x-2">
                            <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-primary">Roles</a>
                                                        <a href="" class="btn btn-primary">Permissions</a>
                           <form method="post" action="{{route('admin.users.destroy',$user->id)}}" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn  btn-danger" type="submit">Delete</button>
                                </form>
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
