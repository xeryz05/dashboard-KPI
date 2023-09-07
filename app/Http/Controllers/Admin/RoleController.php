<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Role;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('admin.roles.index', compact('roles', 'roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }
    public function store(Request $request)
    {
        $validate = $request->validate(['name' =>['required', 'min:3']]);
        Role::create($validate);

        return to_route('role.index');
    }
    public function edit(Role $role)
    {
        $permission = Permission::all();
        return view('admin.roles.edit', compact('role','permission'));
    }

    public function update(Request $request,Role $role)
    {
        $validate = $request->validate(['name' => ['required', 'min:3']]);
        $role->update($validate);

        return to_route('role.index');
    }

    public function destroy($id)
    {
        $item = Role::findOrFail($id);
        $item->delete();

        return redirect()->route('role.index');
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('error', 'Permission exists');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success', 'Permission add');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with(['success' => 'Permission revoke.']);
        }
        return back()->with(['error' => 'Permission not exist.']);
    }
}
