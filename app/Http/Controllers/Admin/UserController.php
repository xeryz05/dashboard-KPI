<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;
use App\Models\Departement;
use App\Http\Requests\Admin\UserRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        $comapanies = Company::get();
        // @dd($users);

        return view('admin.users.index', compact('users','comapanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::get();
        $departements = Departement::get();
        $roles = Role::get();

        // @dd($companies);

        return view('admin.users.create', [
            'companies' => $companies,
            'departements' => $departements,
            'roles' => $roles,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        $datausers = $request->all();

        $datausers['password'] = bcrypt($request->password);

        User::create($datausers);
        // @dd($request);

        return redirect()->route('users.index');

        // if($users){
        //     //redirect dengan pesan sukses
        //     return redirect()->route('users.index')->with(['success' => 'Data Berhasil Disimpan!']);
        // }else{
        //     //redirect dengan pesan error
        //     return redirect()->route('users.index')->with(['error' => 'Data Gagal Disimpan!']);
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $role = Role::all();
        $permission = Permission::all();

        return view('admin.users.show', compact('user', 'role', 'permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::with(['company','departement','role'])->findOrFail($id);
        $departement = Departement::all();
        $role = Role::all();
        $company = Company::all();

        return view('admin.users.edit',[
            'item' => $item,
            'departement' => $departement,
            'role' => $role,
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->all();

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }
        else {
            unset($data['password']);
        }

        $item = User::findOrFail($id);

        $data->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('users.index');
    }
    public function assignRole(Request $request, User $user)
    {
        if ($user->hasRole($request->role)) {
            return back()->with('error', 'Role exists.');
        }

        $user->assignRole($request->role);
        return back()->with('success', 'Role assigned.');
    }

    public function removeRole(User $user, Role $role)
    {
        if ($user->hasRole($role)) {
            $user->removeRole($role);
            return back()->with('success', 'Role removed.');
        }

        return back()->with('error', 'Role not exists.');
    }
    public function givePermission(Request $request, User $user)
    {
        if ($user->hasPermissionTo($request->permission)) {
            return back()->with('error', 'Permission exists');
        }
        $user->givePermissionTo($request->permission);
        return back()->with('success', 'Permission add');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if ($user->hasPermissionTo($permission)) {
            $user->revokePermissionTo($permission);
            return back()->with(['success' => 'Permission revoke.']);
        }
        return back()->with(['error' => 'Permission not exist.']);
    }
}

