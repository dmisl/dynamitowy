@extends('layouts.main')

@section('title', 'Strona glowna')

@section('content')

    <div style="position:fixed; z-index: -20; width: 100%; height: 100vh; background-image: url('https://images.pexels.com/photos/158826/structure-light-led-movement-158826.jpeg'); background-size: cover; background-repeat: no-repeat;"></div>

    <div class="container bg-light">

        <div style="width: 80%; padding-top: 20vh; margin: 0 auto;">

            <div class="container text-center">

                <div class="d-flex user-select-none" style="flex-wrap: wrap;">

                    <a href="" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-dark d-table text-center" style="width: 90%; height: 100%;">
                            <h2 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Wiadomosci ></h2>
                        </div>
                    </a>

                    <a href="{{ route('journal.index') }}" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-dark d-table text-center" style="width: 90%; height: 100%;">
                            <h1 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Dziennik ></h1>
                        </div>
                    </a>

                    <a href="" class="text-decoration-none col-md-4 col-12 text-light mt-2">
                        <div class="mx-auto bg-danger d-table text-center" style="width: 90%; height: 100%;">
                            <h3 class="fw-light m-0 d-table-cell py-2" style="vertical-align: middle;">Ogłoszenia</h3>
                        </div>
                    </a>

                </div>

            </div>

        </div>

    </div>

@endsection
