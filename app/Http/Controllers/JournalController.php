<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index()
    {
        // $todayLessons = Lesson::query()->where(['subject_id' => Auth::user()->teacher])->orderBy('lesson_nr', 'asc')->get();
        return view('journal.index');
    }
}
