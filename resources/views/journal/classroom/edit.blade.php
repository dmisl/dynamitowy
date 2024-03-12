@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">

        <x-classroom-menu></x-classroom-menu>

        <div class="col-md-9 user-select-none">

            <classroom-edit user_id="{{ $student->id }}"></classroom-edit>

        </div>
    </div>

@endsection
