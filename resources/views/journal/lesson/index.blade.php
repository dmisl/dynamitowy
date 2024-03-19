@extends('layouts.journal')

@section('title', 'Lesson')

@section('content')

    <lesson-parent :teacher_id="{{ Auth::user()->teacher->id }}"></lesson-parent>

@endsection
