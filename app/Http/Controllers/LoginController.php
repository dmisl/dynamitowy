<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function store(Request $request)
    {

        $validated = $request->validate([
            'email' => ['required', 'string', 'min:5'],
            'password' => ['required', 'string'],
        ]);

        if(Auth::attempt($validated))
        {
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
}
