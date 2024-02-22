@extends('layouts.main')

@section('title', 'Logowanie')

@section('content')

    <div class="d-flex flex-column user-select-none">
        <header class="w-100 bg-dark">
            <div class="container">
                <h1 class="text-light py-3 m-0">{{ env('APP_NAME') }}</h1>
            </div>
        </header>

        <main class="container">

            <form action="{{ route('login.store') }}" method="POST">
                @csrf
                <div class="row" style="margin-top: 100px;">
                    <div class="px-4 col-md-8 col-12 offset-2 pb-3" style="background-color: rgb(231, 231, 231);">

                        <h3 class="fw-light text-primary mt-3 text-center">
                            Logowanie
                        </h3>
                        <p class="text-dark text-center">Prosze podac email i haslo</p>

                        <div class="form-item">
                            <label class="small" for="email">E-mail:</label>
                            <input class="w-100 small" id="email" name="email" autofocus>
                        </div>

                        <div class="form-item mt-2">
                            <label class="small" for="password">Haslo:</label>
                            <input class="w-100 small" id="password" name="password" type="password">
                        </div>

                        <div class="d-flex mt-3">
                            <div class="mx-auto">
                                <a href="" class="small text-dark text-decoration-none d-inline-block border-end border-dark px-2">Zaloz konto</a>
                                <a href="" class="small text-dark text-decoration-none d-inline-block border-end border-dark px-2">Przywroc dostep</a>
                                <a href="" class="small text-dark text-decoration-none d-inline-block ps-2">Zmien haslo</a>
                            </div>
                        </div>

                        <div class="mt-3 mx-auto">
                            Login as <br>
                            <select name="role" id="">
                                <option value="1" selected>student</option>
                                <option value="2">teacher</option>
                                <option value="3">headmaster</option>
                            </select>
                        </div>

                        <div class="form-item mt-2 text-center">
                            <button class="btn btn-success text-light p-0">
                                <h3 class="fw-light p-2 m-0">Zaloguj sie</h3>
                            </button>
                        </div>

                        <div class="text-center small mt-2">
                            <a role="button" class="text-decoration-none">Nie wiesz jak sie zalogowac? <span class="text-decoration-underline">Skorzystaj z naszych porad</span></a>
                        </div>

                    </div>
                </div>
            </form>

        </main>

    </div>

@endsection
