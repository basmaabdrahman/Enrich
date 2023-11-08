@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="title">Update Role</h5>
            <a href="{{route('admin.users.index')}}">Role index</a>

        </div>
        <div class="flex flex-col p-2 bg-slate-300">
            <div><h4>Name:</h4>{{$user->name}}</div>
            <div><h4>Email</h4>{{$user->email}}</div>
        </div>
    </div>
    <div class="card">
        <div class="mt-6 p-2">
            <h2 class="text-2xl font-semibold">Roles</h2>
            <div class="flex space-x-2 mt-4 p-2">
                @if($user->roles)
                    @foreach($user->roles as $user_role)
                        <form method="post" action="{{route('admin.users.roles.remove',[$user->id, $user_role->id])}}" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button  class="btn  btn-danger" type="submit">{{ $user_role->name}}</button>
                        </form>
                    @endforeach
                @endif
            </div>
            <div >
                <form method="post" action="{{route('admin.users.roles',$user->id)}}">
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
    <div class="card">
        <div class="mt-6 p-2">
            <h2 class="text-2xl font-semibold">Permissions</h2>
            <div class="flex space-x-2 mt-4 p-2">
                @if($user->permissions)
                    @foreach($user->permissions as $permission_user)
                        <form method="post" action="{{route('admin.users.permission.remove',[$user->id, $permission_user->id])}}" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button  class="btn  btn-danger" type="submit">{{ $permission_user->name}}</button>
                        </form>
                    @endforeach
                @endif
            </div>
            <div >
                <form method="post" action="{{route('admin.users.permissions',$user->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="role">Permission</label>
                                <select id="role"  name='permission' class="form-control">
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->name}}">{{$permission->name}}</option>
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
