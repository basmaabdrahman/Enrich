@extends("layouts.admin")
@section('content')

    <div class="col-md-12">
        <div class="card  card-plain">
            <div class="card-header">
                <h4 class="card-title"> Admin ROLes</h4>
                <a href="{{route('admin.roles.create')}}">Create Role</a>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table tablesorter " id="">
                        <thead class=" text-primary">
                        <tr>

                            <th>
                                Name
                            </th>
                            <th >
                                Operations
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                        <tr>
                            <td>
                                {{$role->name}}
                            </td>
                            <td class="flex space-x-2">

                                <a href="{{route('admin.roles.edit',$role->id)}}" class="btn  btn-primary">Edit</a>
                                <form method="post" action="{{route('admin.roles.destroy',$role->id)}}" onsubmit="return confirm('Are you sure?')">
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
