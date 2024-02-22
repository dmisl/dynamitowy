@extends('layouts.main')

@section('title', 'Strona glowna')

@section('content')

    <div style="position:fixed; z-index: -20; width: 100%; height: 100vh; background-image: url('https://images.pexels.com/photos/158826/structure-light-led-movement-158826.jpeg'); background-size: cover; background-repeat: no-repeat;"></div>

    <header class="bg-dark w-100 p-2 user-select-none" style="position: fixed; z-index: 99;">
        <div class="container text-light d-flex">
            <h3 class="fw-light m-0">{{ env('APP_NAME') }}</h3>
            <div class="ms-auto" style="display: table;">
                <div class="small" style="display: table-cell; vertical-align: middle;">{{ Auth::user()->name }} - {{ Auth::user()->email }} <a class="text-light" href="{{ route('login.logout') }}">(wyloguj)</a></div>
            </div>
        </div>
    </header>

    <div class="container bg-light" style="height: 200vh;">

        <div style="width: 80%; padding-top: 20vh; margin: 0 auto;">

            <div class="container text-center">

                <div class="d-flex user-select-none" style="flex-wrap: wrap;">

                    <a href="" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-dark d-table text-center" style="width: 90%; height: 100%;">
                            <h1 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Wiadomosci ></h1>
                        </div>
                    </a>

                    <a href="" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-dark d-table text-center" style="width: 90%; height: 100%;">
                            <h1 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Uczen ></h1>
                        </div>
                    </a>

                    <a href="" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-danger d-table text-center" style="width: 90%; height: 100%;">
                            <h3 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Plan zajec ucznia</h3>
                        </div>
                    </a>

                    <a href="" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-danger d-table text-center" style="width: 90%; height: 100%;">
                            <h1 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Ostatnie oceny</h1>
                        </div>
                    </a>

                    <a href="" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-primary d-table text-center" style="width: 90%; height: 100%;">
                            <h2 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Zadania domowe</h2>
                        </div>
                    </a>

                    <a href="" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-primary d-table text-center" style="width: 90%; height: 100%;">
                            <h3 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Terminy sprawdzianow</h3>
                        </div>
                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection
