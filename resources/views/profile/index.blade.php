@extends('layouts.main')

@section('title', 'Dziennik')

@section('content')

    <div class="w-100 text-start">

        <div class="d-flex">
            @if($user->photo)

                <div style="width: 200px; height: 200px; background-image: url('{{ asset($user->photo) }}')"></div>

            @else

                <div style="width: 200px; height: 200px; background-position: center; background-size: cover; background-repeat: no-repeat; background-image: url('{{ asset('https://upload.wikimedia.org/wikipedia/commons/1/1e/Default-avatar.jpg') }}')"></div>

            @endif

            <div class="flex-grow-1">
                <div class="ps-3">
                    <h1>{{ $user->name }}</h1>
                    <h4>{{ $user->classroom->name }}</h4>
                </div>
            </div>

        </div>

        <div class="row mt-5">

            <div class="col-md-3 text-center">
                <div class="bg-primary d-table mx-auto" style="width: 90%; height: 100%;">
                    <h5 class="d-table-cell align-middle fw-light text-light m-0 p-2">Zadanie domowe</h5>
                </div>
            </div>

            <div class="col-md-3 text-center">
                <a class="text-decoration-none" href="{{ route('profile.grades') }}">
                    <div class="bg-warning mx-auto" style="width: 90%;">
                        <h3 class="fw-light text-dark m-0 p-2">Oceny</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-3 text-center">
                <a class="text-decoration-none" href="{{ route('profile.timetable') }}">
                    <div class="bg-danger mx-auto" style="width: 90%;">
                        <h3 class="fw-light text-dark m-0 p-2">Plan lekcji</h3>
                    </div>
                </a>
            </div>

            <div class="col-md-3 text-center">
                <div class="bg-dark mx-auto" style="width: 90%;">
                    <h3 class="fw-light text-light m-0 p-2">Frekfencja</h3>
                </div>
            </div>

        </div>

    </div>

@endsection
