@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="title">Update Permission</h5>
            <a href="{{route('admin.permissions.index')}}">Permission index</a>

        </div>
        <div class="card-body">
            <form method="post" action="{{route('admin.permissions.update',$permission->id)}}">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-4 pl-md-1">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Permission Name</label>
                            <input type="text" class="form-control" placeholder="{{$permission->name}}"  name="name" required>
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
            <h2 class="text-2xl font-semibold">Permissions</h2>
            <div class="flex space-x-2 mt-4 p-2">
                @if($permission->roles)
                    @foreach($permission->roles as $permission_role)
                        <form method="post" action="{{route('admin.permission.roles.remove',[$permission->id, $permission_role->id])}}" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button  class="btn  btn-danger" type="submit">{{ $permission_role->name}}</button>
                        </form>
                    @endforeach
                @endif
            </div>
            <div >
                <form method="post" action="{{route('admin.permissions.roles',$permission->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="role">Role</label>
                                <select id="role"  name='role' class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                            <span class="text-red-400">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div >
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
