<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = array('user', 'manager', 'admin');
        $users = User::orderBy('name', 'desc')->get();
        return view('users.index', compact('users', 'roles'));
    
    }
    public function usersByRole(Request $request)
    {
        $roles = array('admin', 'manager', 'user');
        $data = $request->all();
        $selectedRole = $data['role'];
        if($data['role'] == '0') {
            return redirect('/users');
        } else {
            $users = User::where('role', 'LIKE', $data['role'])->get();
            return view('users.index', compact('users', 'roles', 'selectedRole'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        if($confirm_password == $password) {
            User::create([
                'name' => $request->name,
                'password' => Hash::make($password),
                'email' => $request->email,
                'role' => $request->role
            ]);
        }
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required'
        ]);
        if($request->password) {
            $request->validate([
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required',
            ]);
            $user->update([
                'name' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'role'=>$request->role,
            ]);
        }
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
