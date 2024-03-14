@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <classroom-parent :classroom_id="{{ $classroom->id }}"></classroom-parent>

@endsection
