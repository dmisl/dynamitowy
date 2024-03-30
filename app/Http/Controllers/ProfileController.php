<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($redirect = 0)
    {
        $user = Auth::user();
        return view('profile.index', compact('user', 'redirect'));
    }
    public function grades()
    {
        $user = Auth::user();
        return view('profile.grades', compact('user'));
    }
    public function timetable()
    {
        $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
        $timetableEnd = ['0' => '7:55', '1' => '8:45', '2' => '9:35', '3' => '10:25', '4' => '11:15', '5' => '12:20', '6' => '13:10', '7' => '14:00', '8' => '14:50', '9' => '15:40', '10' => '16:30', '11' => '17:20',];
        $user = Auth::user();
        return view('profile.timetable', compact('user', 'timetable', 'timetableEnd'));
    }
    public function warnings()
    {
        $user = Auth::user();
        return view('profile.warnings', compact('user'));
    }
}
