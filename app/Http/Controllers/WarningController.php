<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $validated = $request->validate([
            'user' => ['required', 'exists:users,id'],
            'desc' => ['required', 'string', 'min:5'],
        ]);

        Warning::create([
            'user_id' => $validated['user'],
            'teacher_id' => Auth::user()->teacher->id,
            'classroom_id' => User::find($validated['user'])->classroom->id,
            'desc' => $validated['desc'],
            'date' => date('Y-m-d'),
        ]);

        return redirect()->route('warning.index');
    }
    public function show($id)
    {
        $warning = Warning::find($id);
        return view('journal.warning.show', compact('warning'));
    }
}
