<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use App\Models\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        $user = User::create(['name' => $request->name, 'email' => $request->email, 'password' => 'teacher', 'role_id' => 2, 'photo' => '']);
        $teacher = Teacher::create(['user_id' => $user->id]);

        return response()->json(['message' => 'successfully created', 'teacher_id' => $teacher->id]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        User::find($request->id)->update(['name' => $request->name, 'email' => $request->email]);

        return response()->json(['message' => 'successfully updated']);
    }
    public function delete(Request $request)
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

        $user = User::find($request->id);

        foreach (Subject::query()->where(['teacher_id' => $user->teacher->id])->get() as $subject) {
            foreach (Lesson::query()->where(['subject_id' => $subject->id])->get() as $lesson) {
                $lesson->delete();
            }
            $subject->delete();
        }

        if(Warning::query()->where(['teacher_id' => $user->teacher->id])->get()->count() > 0)
        {
            foreach (Warning::query()->where(['teacher_id' => $user->teacher->id])->get() as $warning) {
                $warning->delete();
            }
        }

        $classroom = Classroom::query()->where(['teacher_id' => $user->teacher->id])->first();
        if($classroom)
        {
            foreach (Warning::query()->where(['classroom_id' => $classroom->id])->get() as $warning) {
                $warning->delete();
            }
            foreach ($classroom->users as $student) {
                $student->delete();
            }
            $classroom->delete();
        }

        Teacher::find($user->teacher->id)->delete();

        $user->delete();

        return response()->json(['message' => 'successfully deleted']);
    }
}
