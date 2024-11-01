<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->has('first_visit')) {

            $request->session()->put('first_visit', true);

            Auth::login(User::find(1));

            return redirect('home.index');

        }
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
                if(User::find(57))
                {
                    Auth::login(User::find(57));
                } else
                {
                    Auth::login(User::query()->where(['role_id' => 1])->first());
                }
                break;
            case 2:
                if(User::find(7))
                {
                    Auth::login(User::find(7));
                } else
                {
                    Auth::login(Teacher::first()->user_id);
                }
                break;
            case 3:
                Auth::login(User::find(1));
                break;
            case 4:
                if(User::find(13))
                {
                    Auth::login(User::find(13));
                } else
                {
                    Auth::login(User::find(Classroom::first()->teacher->user_id));
                }
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
