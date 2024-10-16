<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
           ]);

           User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'email' => bcrypt($validated['password']),
           ]);

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storageuser.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,
            email,'.$user->id,
            'password' => 'nullable|min:8',
           ]);

           User::update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'email' => $request->$password ? bcrypt($request->password) : $user->password,
           ]);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
