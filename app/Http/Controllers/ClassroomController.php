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
use Illuminate\Support\Facades\Validator;

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

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'classroom_id' => ['required'],
            'photo' => $request->hasFile('photo') ? ['file', 'image'] : ['nullable'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        $path = asset('storage/photos/default.jpg');
        if($request->hasFile('photo'))
        {
            $storaged = Storage::disk('public')->put("photos", $request->photo);
            $path = 'storage/'.$storaged;
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'classroom_id' => $request->classroom_id,
            'photo' => $path,
            'password' => 'student',
            'role_id' => 1
        ]);

        return response()->json([
            'message' => 'success',
        ], 200);

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

        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email'],
            'classroom_id' => ['required'],
            'photo' => $request->hasFile('photo') ? ['file', 'image'] : ['nullable'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        $user = User::find($request->id);

        $path = asset('storage/photos/default.jpg');
        if($request->hasFile('photo'))
        {
            $storaged = Storage::disk('public')->put("photos", $request->photo);
            $path = 'storage/'.$storaged;
        }
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'classroom_id' => $request->classroom_id,
            'photo' => $path
        ]);

        return response()->json([
            'message' => 'success',
        ], 200);

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

        $validator = Validator::make($request->all(), [
            'subject_id' => ['required'],
            'classroom_id' => ['required'],
            'day' => ['required'],
            'lesson_number' => ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        $lesson = Lesson::query()->where([
            'classroom_id' => $request->classroom_id,
            'day' => $request->day,
            'lesson_number' => $request->lesson_number
        ])->get();

        if($lesson->count() !== 0)
        {
            if($request->subject_id == 'delete')
            {
                $lesson->first()->delete();
                return response()->json([
                    'message' => 'deleted',
                ], 200);
            } else
            {
                $lesson->first()->update([
                    'subject_id' => $request->subject_id,
                    'classroom_id' => $request->classroom_id,
                    'day' => $request->day,
                    'lesson_number' => $request->lesson_number,
                ]);
                return response()->json([
                    'message' => 'updated',
                ], 200);
            }
        } else
        {
            Lesson::create([
                'subject_id' => $request->subject_id,
                'classroom_id' => $request->classroom_id,
                'day' => $request->day,
                'lesson_number' => $request->lesson_number,
            ]);
            return response()->json([
                'message' => 'created',
            ], 200);
        }

    }

}
