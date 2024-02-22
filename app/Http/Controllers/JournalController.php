<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        return view('journal.index');
    }
}
