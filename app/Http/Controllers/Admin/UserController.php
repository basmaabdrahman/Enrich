<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }
    public function destroy($id){
        $user=User::find($id);
        $user->delete();
        return redirect('admin/users');
    }

    public function assignRole(User $user,Request $request){
        if($user->hasRole($request->role)){
            return back();
        }
        $user->assignRole($request->role);
        return back();
    }
    public function removeRole(User $user ,Role $role){
        if($user->hasRole($role)){
            $user->removeRole($role);
            return back();
        }
        return back();
    }
    public function show($id){
        $roles=Role::all();
        $permissions=Permission::all();
        $user=User::find($id);
        return view('admin.users.role',compact('user','roles','permissions'));
    }
    public function givePermission(User $user,Request $request){
        if ($user->hasPermissionTo($request->permission)){
            return back();
        }
        $user->givePermissionTo($request->permission);
        return back();
    }
    public function revokePermission(User $user,Permission $permission){
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);
            return back();
        }
        return back();
    }
}
