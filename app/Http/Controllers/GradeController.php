<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Grade;
use App\Models\GradeReason;
use App\Models\Lesson;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function show($classroom_id, $subject_id)
    {
        $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
        $subject = Subject::find($subject_id);
        $subjects = Subject::query()->where(['teacher_id' => Auth::user()->teacher->id])->get('id');
        $lessons = Lesson::query()->where(['day' => date('N') <= 5 ? date('N') : 1])->whereIn('subject_id', $subjects)->get();
        $classroom = Classroom::find($classroom_id);
        $gradeReasons = GradeReason::query()->where(['subject_id' => $subject_id, 'classroom_id' => $classroom_id])->get();
        return view('journal.grade.show', compact('lessons', 'classroom', 'timetable', 'subject', 'gradeReasons'));
    }
    public function edit($classroom_id, $subject_id)
    {
        $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
        $subject = Subject::find($subject_id);
        $subjects = Subject::query()->where(['teacher_id' => Auth::user()->teacher->id])->get('id');
        $lessons = Lesson::query()->where(['day' => date('N') <= 5 ? date('N') : 1])->whereIn('subject_id', $subjects)->get();
        $classroom = Classroom::find($classroom_id);
        $gradeReasons = GradeReason::query()->where(['subject_id' => $subject_id, 'classroom_id' => $classroom_id])->get();
        return view('journal.grade.edit', compact('lessons', 'classroom', 'timetable', 'subject', 'gradeReasons'));
    }
}
