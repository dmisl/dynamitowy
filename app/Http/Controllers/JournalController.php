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
        $day = date('N') <= 5 ? date('N') : 1;
        $teacher = Auth::user()->teacher;
        $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
        $subjects = Subject::query()->where(['teacher_id' => Auth::user()->teacher->id])->get('id');
        $lessons = Lesson::query()->where(['day' => $day])->whereIn('subject_id', $subjects)->get();
        $classroom = Classroom::find($lessons->first()->classroom->id);
        return view('journal.index', compact('day', 'lessons', 'timetable', 'subjects', 'classroom'));
    }
}
