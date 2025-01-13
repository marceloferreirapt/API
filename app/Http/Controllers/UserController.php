<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // List all users
    public function index()
    {
        return response()->json(User::with('country')->get());
    }

    // Create a new user
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'country_id' => 'required|exists:countries,id', // Validates that country exists
            'isActive' => 'required|boolean', // Ensures isActive is a boolean
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'country_id' => $validated['country_id'],
            'isActive' => $validated['isActive'],
        ]);

        return response()->json($user, 201); // Return the created user
    }

    // Show a specific user by ID
    public function show($id)
    {
        $user = User::with('country')->find($id); // Include country information
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    // Update a specific user by ID
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'country_id' => 'nullable|exists:countries,id',
            'isActive' => 'nullable|boolean',
        ]);

        $user->update($validated);

        return response()->json($user);
    }

    // Delete a specific user by ID
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
