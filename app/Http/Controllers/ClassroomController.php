<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClassroomController extends Controller
{
    public function index()
    {
        $classroom = Auth::user()->teacher->classroom;
        $students = User::query()->where(['classroom_id' => $classroom->id])->orderBy('name', 'asc')->get();
        return view('journal.classroom.index', compact('students', 'classroom'));
    }
    public function create()
    {
        return view('journal.classroom.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'photo' => ['nullable', 'file', 'image'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $request->hasFile('photo') ? $request->photo : 'http://127.0.0.1:8000/storage/photos/default.png',
            'classroom_id' => User::find(Auth::id())->teacher->classroom->id,
            'password' => 'student',
            'role_id' => 1,
        ]);

        return redirect()->route('classroom.show', $user->id);

    }
    public function show($id)
    {
        $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
        $student = User::find($id);
        $subjects = Subject::all()->toArray();
        $lessons = Lesson::query()->where(['classroom_id' => $student->classroom->id, 'day' => date('N') <= 5 ? date('N') : 1])->orderBy('lesson_number', 'asc')->get();
        return view('journal.classroom.show', compact('id', 'student', 'lessons', 'timetable', 'subjects'));
    }
    public function edit($id)
    {
        $classes = Classroom::all();
        $student = User::find($id);
        if($student->classroom->id == Auth::user()->teacher->classroom->id)
        {
            return view('journal.classroom.edit', compact('id', 'student', 'classes'));
        } else
        {
            return redirect()->route('journal.index');
        }
    }
    public function update(Request $request)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'class' => ['required'],
            'photo' => ['file', 'image'],
        ]);

        $student = User::query()->where(['email' => $validated['email']])->first();
        $path = asset('storage/photos/default.png');
        if($request->hasFile('photo'))
        {
            $storaged = Storage::disk('public')->put("photos", $request->photo);
            $path = 'storage/'.$storaged;
        }
        $student->update([
            'name' => $validated['name'],
            'name' => $validated['name'],
            'name' => $validated['name'],
            'photo' => $path
        ]);

        return back();

    }
    public function timetable()
    {
        $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
        $days = [1 => 'Poniedzialek', 2 => 'Wtorek', 3 => 'Sroda', 4 => 'Czwartek', 5 => 'Piatek'];
        $subjects = Subject::all()->toArray();
        $classroom = User::find(Auth::id())->teacher->classroom;
        $day1 = Lesson::query()->where(['day' => 1, 'classroom_id' => $classroom->id])->orderBy('lesson_number', 'asc')->get();
        $day2 = Lesson::query()->where(['day' => 2, 'classroom_id' => $classroom->id])->orderBy('lesson_number', 'asc')->get();
        $day3 = Lesson::query()->where(['day' => 3, 'classroom_id' => $classroom->id])->orderBy('lesson_number', 'asc')->get();
        $day4 = Lesson::query()->where(['day' => 4, 'classroom_id' => $classroom->id])->orderBy('lesson_number', 'asc')->get();
        $day5 = Lesson::query()->where(['day' => 5, 'classroom_id' => $classroom->id])->orderBy('lesson_number', 'asc')->get();
        return view('journal.classroom.timetable', compact('timetable', 'days', 'subjects', 'classroom', 'day1', 'day2', 'day3', 'day4', 'day5'));
    }
    public function timetable_edit()
    {
        $timetable = ['0' => '7:10', '1' => '8:00', '2' => '8:50', '3' => '9:40', '4' => '10:30', '5' => '11:35', '6' => '12:25', '7' => '13:15', '8' => '14:05', '9' => '14:55', '10' => '15:45', '11' => '16:35',];
        $subjects = Subject::all();
        $days = [1 => 'Poniedzialek', 2 => 'Wtorek', 3 => 'Sroda', 4 => 'Czwartek', 5 => 'Piatek'];
        $classroom = User::find(Auth::id())->teacher->classroom;
        return view('journal.classroom.timetable_edit', compact('timetable', 'subjects', 'classroom', 'days'));
    }
    public function timetable_update(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'lessons' => ['required'],
            'classroom_id' => ['required'],
        ]);
        foreach ($validated['lessons'] as $day => $timetable) {
            foreach ($timetable as $lesson_number => $subject_id) {
                if($subject_id)
                {
                    $lssn = Lesson::query()->where(['classroom_id' => $validated['classroom_id'], 'lesson_number' => $lesson_number, 'day' => $day])->first();
                    if($lssn)
                    {
                        $lssn->update([
                            'subject_id' => $subject_id,
                        ]);
                    } else
                    {
                        Lesson::create([
                            'subject_id' => $subject_id,
                            'classroom_id' => $validated['classroom_id'],
                            'day' => $day,
                            'lesson_number' => $lesson_number,
                        ]);
                    }
                } else
                {
                    $lssn = Lesson::query()->where(['classroom_id' => $validated['classroom_id'], 'lesson_number' => $lesson_number, 'day' => $day])->first();
                    if($lssn)
                    {
                        $lssn->delete();
                    }
                }
            }
        }
        return redirect()->route('classroom.timetable');
    }

}
