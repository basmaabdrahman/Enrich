<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permission.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:4']]);
        Permission::create($validated);
        return to_route('admin.permissions.index');
    }

    public function edit($id)
    {
        $permission = Permission::find($id);
        $roles = Role::all();
        return view('admin.permission.update', compact('permission', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::find($id);
        $permission->update([
            'name' => $request->name
        ]);
        return to_route('admin.permissions.index');
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return to_route('admin.permissions.index');

    }

    public function assignRole(Permission $permission, Request $request)
    {
        if ($permission->hasRole($request->role)) {
        }
        $permission->assignRole($request->role);

        return back();
    }

    public function removeRole( Permission $permission,Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back();
        }
        return back();
    }
}
