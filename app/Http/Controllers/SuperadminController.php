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
    public function edit(User $user)
    {
        $users = User::all(); 
        return view('DisplayUser', compact('users', 'user'));
    }
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $user->id,
            'role'     => 'required|in:user,admin,supervisor,superadmin',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = $request->password;

        $user->save();

        return redirect()->route('Users')->with('success', 'User updated successfully.');
    }
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('Users')->with('success','deleted');
    }
}
