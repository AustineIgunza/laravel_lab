<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddUser;

class AddUserController extends Controller
{
    // Show the Add User form
    public function create()
    {
        return view('addUser');
    }

    // Handle form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'roleId' => 'required|integer|exists:roles,roleId',
        ]);

        $user = new AddUser();
        $user->name = ucwords($validated['name']);
        $user->email = strtolower($validated['email']);
        $user->roleId = $validated['roleId'];
        $user->save();

        return redirect()->route('addUser')->with('status', 'User added successfully!');
    }
}
