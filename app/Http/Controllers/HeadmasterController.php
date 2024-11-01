<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeadmasterController extends Controller
{

    public function index($redirect = 0)
    {
        return view('headmaster.index', compact('redirect'));
    }

}
