<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function show()
    {
        return view('journal.grade.show');
    }
}
