<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function show($id)
    {
        // timetable + teacher + teacher`s subjects
        $teacher = Auth::user()->teacher;
        $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
        $subjects = Subject::query()->where(['teacher_id' => $teacher->id])->get('id');
        // Selected lesson + selected classroom + teacher`s lessons that day
        $currentLesson = Lesson::find($id);
        $lessons = Lesson::query()->where(['day' => $currentLesson->day])->whereIn('subject_id', $subjects)->get();
        $classroom = Classroom::find($currentLesson->classroom->id);
        // dates
        $day = $currentLesson->day;
        return view('journal.grade.show');
    }
}
