@use('App\Models\Presence')

@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <warning-parent :classroom_id="{{ Auth::user()->teacher->classroom ? Auth::user()->teacher->classroom->id : false }}" :teacher_id="{{ Auth::user()->teacher->id }}"></warning-parent>

@endsection
