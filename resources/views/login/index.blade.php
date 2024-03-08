@extends('layouts.main')

@section('title', 'Logowanie')

@section('content')

    <div class="d-flex flex-column user-select-none" id="app">

        <main class="container">
            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-top: 100px;">
                    <login>
                </div>
            </form>

        </main>

    </div>

@endsection
