<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\GradeReason;
use Illuminate\Http\Request;

class GradeReasonController extends Controller
{
    public function store(Request $request)
    {

        return response()->json([
            'message' => $request->all()
        ]);

        // $validated = $request->validate([
        //     'text' => ['required'],
        //     'subject_id' => ['required'],
        //     'classroom_id' => ['required'],
        //     'date' => ['required'],
        // ]);

        // $gradeReason = GradeReason::create([
        //     'text' => $validated['text'],
        //     'subject_id' => $validated['subject_id'],
        //     'classroom_id' => $validated['classroom_id'],
        //     'date' => $validated['date'],
        // ]);

        // foreach ($gradeReason->classroom->users as $user) {
        //     Grade::create([
        //         'type' => 'brak',
        //         'user_id' => $user->id,
        //         'description' => '',
        //         'grade_reason_id' => $gradeReason->id
        //     ]);
        // }

        // return back();

    }
}
