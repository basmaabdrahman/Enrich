@extends('layouts.admin')
@section('content')
        <div class="card">
            <div class="card-header">
                <h5 class="title">Add Roles</h5>
                <a href="{{route('admin.roles.index')}}">Role index</a>

            </div>
            <div class="card-body">
                <form method="post" action="{{route('admin.roles.store')}}">
                    @csrf
                    <div class="row">

                        <div class="col-md-4 pl-md-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Role Name</label>
                                <input type="text" class="form-control" placeholder="Role name"  name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
@endsection
