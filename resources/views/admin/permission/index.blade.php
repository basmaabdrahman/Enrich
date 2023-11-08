@extends("layouts.admin")
@section('content')

    <div class="col-md-12">
        <div class="card  card-plain">
            <div class="card-header">
                <h4 class="card-title"> Admin Permission</h4>
                                            <a href="{{route('admin.permissions.create')}}">Create permission</a>

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
                        @foreach($permissions as $order)
                        <tr>
                            <td>
                                {{$order->name}}
                            </td>
                            <td>
                                <a href="{{route('admin.permissions.edit',$order->id)}}" class="btn  btn-primary">Edit</a>
                                <form method="post" action="{{route('admin.permissions.destroy',$order->id)}}" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn  btn-danger" type="submit">Delete</button>
                                </form>                            </td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
