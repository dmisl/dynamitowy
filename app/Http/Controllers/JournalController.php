<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JournalController extends Controller
{
    public function index()
    {
        $subjects = Subject::query()->where(['teacher_id' => Auth::user()->teacher->id])->get('id');
        $lesson = Lesson::query()->where(['day' => date('N') <= 5 ? date('N') : 1])->whereIn('subject_id', $subjects)->first();
        return redirect()->route('lesson.show', [$lesson->id, date('Y-m-d')]);
    }
}
