<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        $students = User::query()->where(['classroom_id' => 1])->orderBy('name', 'asc')->get();
        return view('journal.index', compact('students'));
    }
}
