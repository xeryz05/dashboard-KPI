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
        $permissions = Permission::get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate(['name' => 'required']);

        Permission::create($validate);

        return to_route('permission.index');
    }

    public function edit(Permission $permission)
    {
        $role = Role::all();
        // @dd($role);
        return view('admin.permissions.edit', compact('permission','role'));
    }

    public function update(Request $request, Permission $permission)
    {
        $validate =$request->validate(['name' => 'required']);
        $permission->update($validate);

        return to_route('permission.index');
    }
    public function destroy($id)
    {
        $item = Permission::findOrFail($id);
        $item->delete();

        return redirect()->route('permission.index');
    }

    public function assignRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return back()->with('error', 'Role exists.');
        }

        $permission->assignRole($request->role);
        return back()->with('success', 'Role assigned.');
    }

    public function removeRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            return back()->with('success', 'Role removed.');
        }

        return back()->with('error', 'Role not exists.');
    }
}
