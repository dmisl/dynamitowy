<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        Auth::login(User::find(13));
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
    public function login_as($role)
    {
        switch ($role) {
            case 1:
                Auth::login(User::find(57));
                break;
            case 2:
                Auth::login(User::find(7));
                break;
            case 3:
                Auth::login(User::find(1));
                break;
            default:
                # code...
                break;
        }
        return redirect()->route('home.index');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
