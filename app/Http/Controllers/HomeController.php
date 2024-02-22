<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::user()->role_id == 1)
        {
            return view('home.student');
        }
        else if(Auth::user()->role_id == 2)
        {
            return view('home.teacher');
        }
        else if(Auth::user()->role_id == 3)
        {
            return view('home.headmaster');
        }
    }

}
