<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @yield('title')
    </title>
    {{-- BOOTSTRAP --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- POPPINS FONT --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body style="font-family: 'Poppins', sans-serif;">

    <div class="d-flex flex-column justify-content-between overflow-hidden" style="height: 100vh;">

        <header class="w-100 bg-dark text-light m-0 p-0 user-select-none">
            <p class="m-0 p-0">Dynamitowy</p>
            <div class="d-flex">
                <div class="text-center mx-2" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="50" height="50" viewBox="0 0 256 256" xml:space="preserve">
                        <defs>
                        </defs>
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                            <path d="M 45 16.132 c -1.104 0 -2 -0.896 -2 -2 V 8.535 c 0 -1.104 0.896 -2 2 -2 s 2 0.896 2 2 v 5.597 C 47 15.237 46.104 16.132 45 16.132 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(77,60,49); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 83.772 59.752 V 14.158 c 0 -0.598 -0.485 -1.082 -1.082 -1.082 H 7.31 c -0.598 0 -1.082 0.485 -1.082 1.082 v 45.594 c 0 0.598 0.485 1.082 1.082 1.082 h 75.38 C 83.288 60.835 83.772 60.35 83.772 59.752 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(88,153,96); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 88 64.026 H 2 c -1.104 0 -2 -0.896 -2 -2 s 0.896 -2 2 -2 h 86 c 1.104 0 2 0.896 2 2 S 89.104 64.026 88 64.026 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(77,60,49); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 32.307 83.465 c -0.222 0 -0.447 -0.037 -0.667 -0.115 c -1.041 -0.369 -1.586 -1.512 -1.218 -2.553 l 6.881 -19.438 c 0.369 -1.042 1.512 -1.585 2.553 -1.219 c 1.041 0.369 1.586 1.512 1.218 2.553 l -6.881 19.438 C 33.902 82.952 33.13 83.465 32.307 83.465 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(77,60,49); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 57.692 83.465 c -0.823 0 -1.595 -0.513 -1.886 -1.334 l -6.88 -19.438 c -0.368 -1.041 0.177 -2.184 1.219 -2.553 c 1.039 -0.368 2.183 0.176 2.553 1.219 l 6.88 19.438 c 0.368 1.041 -0.177 2.184 -1.219 2.553 C 58.139 83.427 57.914 83.465 57.692 83.465 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(77,60,49); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 45 83.464 c -1.104 0 -2 -0.896 -2 -2 V 62.026 c 0 -1.104 0.896 -2 2 -2 s 2 0.896 2 2 v 19.438 C 47 82.568 46.104 83.464 45 83.464 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(77,60,49); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
                    <p class="m-0 p-0">Lekcje</p>
                </div>
                <div class="text-center mx-2" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="50" height="50" viewBox="0 0 256 256" xml:space="preserve">
                        <defs>
                        </defs>
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                            <path d="M 76.225 14.44 V 3.41 c 0 -1.884 -1.527 -3.41 -3.41 -3.41 H 3.924 c -1.884 0 -3.41 1.527 -3.41 3.41 V 86.59 c 0 1.884 1.527 3.41 3.41 3.41 h 79.643 l -0.056 -0.104 c 3.389 -0.558 5.976 -3.493 5.976 -7.04 V 17.851 c 0 -1.883 -1.527 -3.41 -3.41 -3.41 H 76.225" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(229,228,209); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 78.712 81.237 L 78.712 81.237 c 1.374 0 2.487 -1.114 2.487 -2.487 V 14.44 h -4.975 v 64.309 C 76.225 80.123 77.339 81.237 78.712 81.237 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(186,184,162); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 38.883 25.7 H 9.215 c -0.552 0 -1 0.448 -1 1 v 24.473 c 0 0.553 0.448 1 1 1 h 29.667 c 0.552 0 1 -0.447 1 -1 V 26.7 C 39.883 26.148 39.435 25.7 38.883 25.7 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(249,187,75); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 67.304 27.7 H 48.252 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 19.052 c 0.553 0 1 0.448 1 1 S 67.856 27.7 67.304 27.7 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(186,184,162); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 67.304 39.937 H 48.252 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 19.052 c 0.553 0 1 0.448 1 1 S 67.856 39.937 67.304 39.937 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(186,184,162); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 67.304 52.173 H 48.252 c -0.553 0 -1 -0.447 -1 -1 c 0 -0.552 0.447 -1 1 -1 h 19.052 c 0.553 0 1 0.448 1 1 C 68.304 51.726 67.856 52.173 67.304 52.173 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(186,184,162); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 67.304 64.409 H 9.215 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 58.088 c 0.553 0 1 0.447 1 1 S 67.856 64.409 67.304 64.409 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(186,184,162); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 67.304 76.646 H 9.215 c -0.552 0 -1 -0.447 -1 -1 s 0.448 -1 1 -1 h 58.088 c 0.553 0 1 0.447 1 1 S 67.856 76.646 67.304 76.646 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(186,184,162); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 47.726 14.407 H 9.215 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 38.51 c 0.553 0 1 0.448 1 1 S 48.278 14.407 47.726 14.407 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(186,184,162); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 67.304 14.407 H 58.16 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 9.144 c 0.553 0 1 0.448 1 1 S 67.856 14.407 67.304 14.407 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(186,184,162); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
                    <p class="m-0 p-0">Oddzial</p>
                </div>
                <div class="text-center mx-2" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="50" height="50" viewBox="0 0 256 256" xml:space="preserve">

                        <defs>
                        </defs>
                        <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                            <path d="M 90 50.4 c 0 3.9 -3.161 7.061 -7.061 7.061 h -0.004 c -2.645 0 -5.06 1.482 -6.27 3.835 c -0.526 1.022 -1.102 2.021 -1.727 2.992 c -1.429 2.22 -1.5 5.05 -0.179 7.336 l 0.001 0.002 c 1.95 3.377 0.793 7.696 -2.584 9.645 l -9.353 5.4 c -3.377 1.95 -7.695 0.793 -9.645 -2.584 l -0.001 -0.002 c -1.32 -2.286 -3.806 -3.641 -6.443 -3.513 c -1.154 0.056 -2.307 0.055 -3.455 -0.001 c -2.642 -0.129 -5.133 1.221 -6.456 3.512 l -0.002 0.003 c -1.95 3.377 -6.268 4.534 -9.645 2.584 l -9.353 -5.4 c -3.377 -1.95 -4.534 -6.268 -2.584 -9.645 c 1.342 -2.325 1.209 -5.182 -0.24 -7.442 c -0.289 -0.451 -0.569 -0.91 -0.839 -1.378 c -0.27 -0.468 -0.528 -0.94 -0.774 -1.416 c -1.233 -2.384 -3.641 -3.929 -6.326 -3.929 l 0 0 C 3.161 57.46 0 54.299 0 50.4 V 39.6 c 0 -3.9 3.161 -7.061 7.061 -7.061 h 0.004 c 2.645 0 5.06 -1.482 6.27 -3.835 c 0.525 -1.022 1.102 -2.021 1.727 -2.992 c 1.429 -2.22 1.5 -5.05 0.179 -7.336 l -0.001 -0.002 c -1.95 -3.377 -0.793 -7.696 2.584 -9.645 l 9.353 -5.4 c 3.377 -1.95 7.695 -0.793 9.645 2.584 l 0.001 0.002 c 1.32 2.287 3.806 3.641 6.443 3.513 c 1.154 -0.056 2.307 -0.055 3.455 0 c 2.642 0.129 5.133 -1.221 6.456 -3.512 l 0.002 -0.003 c 1.95 -3.377 6.268 -4.534 9.645 -2.584 l 9.353 5.4 c 3.377 1.95 4.534 6.268 2.584 9.645 c -1.342 2.325 -1.209 5.182 0.24 7.443 c 0.289 0.451 0.568 0.91 0.839 1.378 c 0.27 0.468 0.528 0.94 0.774 1.416 c 1.233 2.384 3.641 3.929 6.326 3.929 c 3.9 0 7.061 3.161 7.061 7.061 V 50.4 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(96,95,109); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <circle cx="44.995999999999995" cy="44.995999999999995" r="26.496" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,201,80); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
                            <path d="M 46.785 24.945 h -3.569 c -1.648 0 -2.945 1.409 -2.808 3.051 l 1.785 21.411 c 0.122 1.46 1.342 2.583 2.808 2.583 h 0 c 1.465 0 2.686 -1.123 2.808 -2.583 l 1.785 -21.411 C 49.729 26.354 48.433 24.945 46.785 24.945 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(221,71,71); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                            <path d="M 45 65.055 L 45 65.055 c -1.556 0 -2.818 -1.262 -2.818 -2.818 v -2.704 c 0 -1.556 1.262 -2.818 2.818 -2.818 h 0 c 1.556 0 2.818 1.262 2.818 2.818 v 2.704 C 47.818 63.793 46.556 65.055 45 65.055 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(221,71,71); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                        </g>
                    </svg>
                    <p class="m-0 p-0">Uwagi</p>
                </div>
            </div>
        </header>
        <div id="app" class="m-0 p-0 flex-grow-1">
            @yield('content')
        </div>

    </div>

</body>
</html>
{{-- ДОДАЄМ VUE --}}
@vite('resources/js/app.js')
