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

        $path = asset('https://upload.wikimedia.org/wikipedia/commons/1/1e/Default-avatar.jpg');
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
    public function remove(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        User::find($request->id)->delete();

        return response()->json(['message' => 'successfully deleted']);

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

        $path = asset('https://upload.wikimedia.org/wikipedia/commons/1/1e/Default-avatar.jpg');
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

    public function teacher_update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'classroom_id' => ['required'],
            'teacher_id' => ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        Classroom::find($request->classroom_id)->update(['teacher_id' => $request->teacher_id]);

        return response()->json(['message' => 'successfully updated']);

    }

    public function new_classroom(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'teacher_id' => ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        Classroom::create(['name' => $request->name, 'teacher_id' => $request->teacher_id]);

        return response()->json(['message' => 'successfully created']);

    }

}
