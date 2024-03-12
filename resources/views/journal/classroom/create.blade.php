@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">

        <x-classroom-menu></x-classroom-menu>

        <div class="col-md-9 user-select-none">

            <classroom-create :classroom_id="{{ Auth::user()->teacher->classroom->id }}"></classroom-create>

        </div>
    </div>

@endsection
