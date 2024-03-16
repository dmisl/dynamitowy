<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WarningController extends Controller
{
    public function index()
    {
        $warnings = Warning::all();
        return view('journal.warning.index', compact('warnings'));
    }
    public function classroom()
    {
        $classroom = Auth::user()->teacher->classroom;
        $warnings = Warning::query()->where(['classroom_id' => $classroom->id])->get();
        return view('journal.warning.classroom', compact('warnings', 'classroom'));
    }
    public function create($id)
    {
        $students = User::query()->where(['role_id' => 1])->get();
        return view('journal.warning.create', compact('id', 'students'));
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => ['required', 'exists:users,id'],
            'desc' => ['required', 'string'],
            'date' => ['required', 'date'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'teacher_id' => ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        $warning = Warning::create([
            'user_id' => $request->user_id,
            'desc' => $request->desc,
            'date' => $request->date,
            'teacher_id' => $request->teacher_id,
            'classroom_id' => $request->classroom_id
        ]);

        return response()->json([
            'message' => "successfully created by id {$warning->id}"
        ]);

    }
    public function show($id)
    {
        $warning = Warning::find($id);
        return view('journal.warning.show', compact('warning'));
    }
}
