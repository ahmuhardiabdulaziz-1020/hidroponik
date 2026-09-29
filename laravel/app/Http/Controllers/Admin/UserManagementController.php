<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{

    public function index()
    {
        $users = User::with('userRole')
            ->orderBy('name')
            ->get();

        return view(
            'admin.users.index',
            compact('users')
        );
    }


    public function create()
    {
        $roles = Role::where('status', true)
            ->get();

        return view(
            'admin.users.create',
            compact('roles')
        );
    }


    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role_id' => 'required|exists:roles,id',

        ]);


        $role = Role::find($request->role_id);


        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make(
                $request->password
            ),

            // legacy sementara
            'role' => $role->kode_role,

            'role_id' => $role->id,

            'status' => true,

        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User berhasil ditambahkan'
            );
    }


    public function edit(User $user)
    {
        $roles = Role::where('status', true)
            ->get();

        return view(
            'admin.users.edit',
            compact(
                'user',
                'roles'
            )
        );
    }


    public function update(Request $request, User $user)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users,email,'.$user->id,

            'role_id' => 'required|exists:roles,id',

        ]);


        $role = Role::find($request->role_id);


        $user->update([

            'name' => $request->name,

            'email' => $request->email,

            'role' => $role->kode_role,

            'role_id' => $role->id,

        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User berhasil diperbarui'
            );
    }


    public function destroy(User $user)
    {
        // jangan hapus data
        // cukup nonaktifkan

        $user->update([
            'status' => false
        ]);


        return redirect()
            ->route('admin.users.index')
            ->with(
                'success',
                'User dinonaktifkan'
            );
    }

    public function activate(User $user)
{
    $user->update([
        'status' => true
    ]);

    return redirect()
        ->route('admin.users.index')
        ->with(
            'success',
            'User berhasil diaktifkan kembali'
        );
}

}