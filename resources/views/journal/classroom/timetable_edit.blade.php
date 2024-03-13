@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">

        <x-classroom-menu></x-classroom-menu>

        <div class="col-md-9 user-select-none">

            <div class="p-3">

                <classroom-timetable-edit :classroom_id="{{ $classroom->id }}"></classroom-timetable-edit>

        </div>
    </div>

@endsection
