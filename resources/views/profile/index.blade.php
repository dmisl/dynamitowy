@extends('layouts.main')

@section('content')

    <div class="d-flex text-start">
        <div style="width: 30%;">{{ dd(Auth::user()->photo ? Auth::user()->photo : asset('storage/photos/default.png')) }}</div>
        <div style="width: 70%;">something</div>
    </div>

@endsection
