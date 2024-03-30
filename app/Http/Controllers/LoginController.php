<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        Auth::login(User::find(57));
        return redirect()->route('home.index');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'min:5'],
            'password' => ['required', 'string'],
            'role' => ['required', 'in:1,2,3'],
        ]);

        if(Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']]))
        {
            User::find(Auth::user()->id)->update(['role_id' => $validated['role']]);
            return redirect()->route('home.index');
        } else
        {
            return redirect()->route('login.index')->withInput();
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
    public function hints()
    {
        return 'spierdalaj';
    }
}
