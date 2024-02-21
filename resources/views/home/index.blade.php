@extends('layouts.main')

@section('title', 'Strona glowna')

@section('content')

    <div style="position:fixed; z-index: -20; width: 100%; height: 100vh; background-image: url('https://images.pexels.com/photos/158826/structure-light-led-movement-158826.jpeg'); background-size: cover; background-repeat: no-repeat;"></div>

    <header class="bg-dark w-100 p-2 user-select-none" style="position: fixed; z-index: 99;">
        <div class="container text-light d-flex">
            <h3 class="fw-light m-0">{{ env('APP_NAME') }}</h3>
            <div class="ms-auto" style="display: table;">
                <div class="small" style="display: table-cell; vertical-align: middle;">Nazwa uzytkownika - email uzytkownika <a class="text-light" href="{{ route('login.logout') }}">(wyloguj)</a></div>
            </div>
        </div>
    </header>

    <div class="container bg-light" style="height: 200vh;">

        <div style="padding-top: 100px;">Some content</div>

    </div>

@endsection
