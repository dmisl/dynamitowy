@extends('layouts.main')

@section('title', 'Logowanie')

@section('content')

    <div class="d-flex flex-column user-select-none" id="app">
        <header class="w-100 bg-dark">
            <div class="container">
                <h1 class="text-light py-3 m-0">{{ env('APP_NAME') }}</h1>
            </div>
        </header>

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
