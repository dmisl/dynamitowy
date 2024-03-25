<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::user()->role_id == 1)
        {
            $today = date('N') <= 5 ? date('N') : 1;
            $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
            $timetableEnd = ['0' => '7:55', '1' => '8:45', '2' => '9:35', '3' => '10:25', '4' => '11:15', '5' => '12:20', '6' => '13:10', '7' => '14:00', '8' => '14:50', '9' => '15:40', '10' => '16:30', '11' => '16:35',];
            $lessons = Auth::user()->classroom->lessons()->where('day', $today)->get();
            $gradeLessons = [];
            foreach (Grade::query()->where(['user_id' => Auth::user()->id])->get() as $grade) {
                if(count($gradeLessons) <= 2)
                {
                    if(!in_array($grade->grade_reason_id, $gradeLessons))
                    {
                        $gradeLessons[] = $grade->grade_reason_id;
                    }
                }
            }
            return view('home.student', compact('lessons', 'timetable', 'timetableEnd', 'gradeLessons'));
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
