@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="title">Update Role</h5>
            <a href="{{route('admin.roles.index')}}">Role index</a>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.roles.update',$role->id)}}">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ROle Name</label>
                            <input type="text" class="form-control" placeholder="{{$role->name}}"  name="name" required>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-fill btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
    <div class="mt-6 p-2">
        <h2 class="text-2xl font-semibold">Role Permissions</h2>
        <div class="flex space-x-2 mt-4 p-2">
            @if($role->permissions)
                @foreach($role->permissions as $role_permission)
                    <form method="post" action="{{route('admin.roles.permission.delete',[$role->id,$role_permission->id])}}" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button  class="btn  btn-danger" type="submit">{{$role_permission->name}}</button>
                    </form>
                @endforeach
            @endif
        </div>
        <div >
            <form method="post" action="{{route('admin.roles.permissions',$role->id)}}">
                @csrf
                <div class="row">
                    <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                            <label for="inputPermission">Permission</label>
                            <select id="permission"  name='permission' class="form-control">
                                @foreach($permission as $order)
                                <option value="{{$order->name}}">{{$order->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('name')
                        <span class="text-red-400">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div >
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
