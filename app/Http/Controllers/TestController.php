<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('test.index');
    }
    public function message(Request $request)
    {
        $message = [];
        foreach ($request->someData as $user) {
            $message[] = "User with id ".$user['id']." has been updated";
        }
        return response()->json([
            'message' => $message,
        ], 200);
    }
}
