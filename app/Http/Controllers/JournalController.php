<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index()
    {
        $today = date('d.m.Y');
        $teacher = Auth::user()->teacher;
        $todayLessons = [];
        
        dd(Auth::user()->teacher->id);
        return view('journal.index', compact('today'));
    }
}
