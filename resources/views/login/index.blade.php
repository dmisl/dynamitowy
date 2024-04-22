<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        Logowanie | Dynamitowy
    </title>
    {{-- BOOTSTRAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- POPPINS FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body class="d-flex flex-column" style="font-family: 'Poppins', sans-serif; height: 100vh; overflow: hidden;">

    <header class="bg-dark w-100 p-2 user-select-none" style="position: fixed; z-index: 99;">
        <div class="container text-light d-flex">
            <a href="{{ route('home.index') }}" class="text-decoration-none text-light fs-3 fw-light m-0">{{ env('APP_NAME') }}</a>
            @if(Auth::check())
                <div class="ms-auto" style="display: table;">
                    <div class="small" style="display: table-cell; vertical-align: middle;">{{ Auth::user()->name }} - {{ Auth::user()->email }} <a class="text-light" href="{{ route('login.logout') }}">(wyloguj)</a></div>
                </div>
            @endif
        </div>
    </header>
    <div id="app" class="m-0 p-0 flex-grow-1 overflow-auto">

        <div class="container bg-light min-vh-100">

            <div style="width: 80%; padding-top: 20vh; margin: 0 auto; height: 100%;">

                <div class="container text-center pb-5">

                    <form action="{{ route('login.store') }}" method="POST">

                        @csrf

                        <div class="col-md-6 offset-3 mt-5">
                            <div class="card">
                                <div class="card-body user-select-none mb-2">

                                    <h2 class="mt-1">Logowanie</h2>

                                    <p class="small text-muted">Proszę podać e-mail i hasło</p>

                                    <div class="text-start px-3 mt-4">

                                        <div class="mt-2">
                                            <label for="email" class="small text-muted p-0 m-0">E-mail:</label>
                                            <input name="email" id="email" type="text" class="form-control form-control-sm">
                                        </div>

                                        <div class="mt-3">
                                            <label for="password" class="small text-muted p-0 m-0">Hasło:</label>
                                            <input name="password" id="password" type="password" class="form-control form-control-sm">
                                        </div>

                                        <div class="text-muted text-center mt-3">
                                            <p class="m-0 p-0" style="font-size: 11px;">lub zaloguj się jako</p>
                                            <p class="m-0 p-0" style="font-size: 11px;">
                                                <a href="{{ route('login.login_as', [3]) }}" class="text-primary text-decoration-underline" role="button">dyrektor</a> |
                                                <a href="{{ route('login.login_as', [4]) }}" class="text-primary text-decoration-underline" role="button">wychowawca klasy</a> |
                                                <a href="{{ route('login.login_as', [2]) }}" class="text-primary text-decoration-underline" role="button">nauczyciel</a> |
                                                <a href="{{ route('login.login_as', [1]) }}" class="text-primary text-decoration-underline" role="button">uczeń</a></p>
                                        </div>

                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-success">Zaloguj się</button>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
</body>
</html>
{{-- ДОДАЄМ VUE --}}
@vite('resources/js/app.js')
