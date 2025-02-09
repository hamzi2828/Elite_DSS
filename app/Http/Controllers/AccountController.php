<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function index() : View {
        $user = User::find(auth()->user()->id);
        return view('home.pages.my_account', compact('user'));
    }

    public function update(Request $request) {
        $validated = $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
            'avatar' => ['sometimes', 'image', 'max:2048']
        ]);
        
        $user = User::findOrFail(auth()->id());
        
        // Update only the fields present in the request
        if ($request->has('name')) {
            $user->name = $validated['name'];
        }
        if ($request->has('email')) {
            $user->email = $validated['email'];
        }
        if ($request->has('password') && $request->password != null) {
            $user->password = Hash::make($validated['password']);
        }
        if ($request->hasFile('avatar')) {
            $user->image = fileUpload($request->file('avatar'), 'users');
        }
        
        $user->save();
        
        return redirect()->route('user.account')->with('success', __('User updated successfully'));
        
    }
}