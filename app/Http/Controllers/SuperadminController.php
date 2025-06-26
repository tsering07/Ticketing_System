<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    public function showUsers()
    {
        $users = User::all();
        return view('DisplayUser', compact('users'));
    }
    public function storeUser(Request $request){
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => ['required', 'email', 'max:255','unique:users,email'],
        'password' => 'required|string|min:6|confirmed',
        'role' => 'required|string|in:user,supervisor,admin,superadmin',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'role' => $request->role,
        ]);
         return redirect()->route('Users')->with('success','');
    }

    public function edit(Request $request){
        return view('DisplayUser', compact(''));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('Users')->with('success','deleted');
}
}
