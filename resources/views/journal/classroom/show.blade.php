@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">

        <x-classroom-menu></x-classroom-menu>

        <div class="col-md-9 user-select-none">

            <classroom-show :classroom_id="{{ $student->classroom_id }}" :user_id="{{ $student->id }}"></classroom-show>

        </div>
    </div>

@endsection
