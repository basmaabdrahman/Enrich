<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(){
       // $roles=Role::whereNotIn('name',['admin'])->get();
        $roles=Role::all();
        return view('admin.roles.index',compact('roles'));
    }
    public function create(){
        return view('admin.roles.create');
    }
    public function store(Request $request){
        $validated=$request->validate(['name'=>['required','min:3']]);
        Role::create($validated);
        return to_route('admin.roles.index');
    }
    public function edit($id){
        $role=Role::find($id);
        $permission=Permission::all();
        return view('admin.roles.update',compact('role','permission'));
    }
    public function update(Request $request,$id){
        $role=Role::find($id);
        $role->update([
            'name'=>$request->name
        ]);
        return to_route('admin.roles.index');
    }
    public function destroy($id){
        $role=Role::find($id);
        $role->delete();
        return to_route('admin.roles.index');

    }
    public function givepermission(Role $role, Request $request){
        if($role->hasPermissionTo($request->permission)){
            return back()->with('message','Role already has this permission');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('message',' permission added');
    }
    public function removePermission(Role $role,Permission $permission){
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            return back();
        }
        return back();
    }
}
