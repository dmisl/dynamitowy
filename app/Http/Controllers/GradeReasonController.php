<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\GradeReason;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GradeReasonController extends Controller
{
    public function store(Request $request)
    {

        return response()->json([
            'message' => $request->all()
        ]);

        $validator = Validator::make($request->all(), [
            'text' => ['required'],
            'subject_id' => ['required'],
            'classroom_id' => ['required'],
            'date' => ['required'],
        ]);

        if($validator->fails())
        {
            return response()->json(
                ['message' => $validator->errors()]
            );
        }

        $gradeReason = GradeReason::create([
            'text' => $request->name,
            'subject_id' => $request->subject_id,
            'classroom_id' => $request->classroom_id,
            'date' => $request->date
        ]);

        return response()->json([
            'message' => $gradeReason->text
        ]);

        foreach ($gradeReason->classroom->users as $user) {
            Grade::create([
                'type' => 18,
                'user_id' => $user->id,
                'grade_reason_id' => $gradeReason->id
            ]);
        }

        return response()->json([
            'message' => 'grade reason has been updated'
        ]);

    }
}
