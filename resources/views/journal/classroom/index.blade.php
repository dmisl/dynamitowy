@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" id="app">

        <x-classroom-menu></x-classroom-menu>

        <div class="col-md-9">

            <classroom-parent :classroom_id="{{ $classroom->id }}"></classroom-parent>
            {{-- <classroom-list classroom_id="{{ $classroom->id }}"></classroom-list> --}}

        </div>
    </div>

@endsection
