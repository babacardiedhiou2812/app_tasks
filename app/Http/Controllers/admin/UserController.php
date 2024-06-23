<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index',[
            "users" => $users
        ]);
    }

    public function edit(User $user)
    {
        $user->load('roles');
        $roles = role::all();
        return view('admin.users.edit',[
            "user" => $user,
            "roles" => $roles
        ]);
    }

    
    public function update(User $user, Request $request)
    {
        $request->validate(
            [
                'roles' => ['array', 'exists:roles,id']
            ]
        );

        // dd($request->input('roles'));
        $user->roles()->sync($request->input('roles'));
        return redirect()->route('admin.users.index');
    }
}
