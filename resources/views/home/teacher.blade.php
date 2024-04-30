@extends('layouts.main')

@section('title', 'Główna strona | Dynamitowy')

@section('content')

    <div class="d-flex min-vh-100 user-select-none">

        <div class="w-50 text-start h-100" style="margin-top: 25vh;">

            <div class="h-100" style="margin-left: 5vw; d-flex flex-column">


                <a href="{{ route('chat.index') }}">
                    <div class="text-light d-inline-block text-center pwidth" style="background-color: black; border-radius: 17px;">

                        <h1 class="fw-light m-0" style="padding: 11px 35px; font-size: 42px;">Wiadomości</h1>

                    </div>
                </a>

                <a href="{{ route('journal.index') }}">
                    <div class="text-light d-inline-block text-center width" style="background-color: #4563FF; border-radius: 17px; margin-top: 26px;">

                        <h1 class="fw-light m-0" style="padding: 11px 35px; font-size: 42px;">Dziennik</h1>

                    </div>
                </a>

                <a href="{{ route('journal.index', [1]) }}">
                    <div class="d-inline-block text-center width" style="background-color: #FFCF53; border-radius: 17px; margin-top: 26px; color: black;">

                        <h1 class="m-0" style="padding: 11px 35px; font-size: 42px; font-weight: 400;">Uwagi</h1>

                    </div>
                </a>

                <a href="{{ route('journal.index', [2]) }}">
                    <div class="text-light d-inline-block text-center width" style="background-color: black; border-radius: 17px; margin-top: 26px; color: black;">

                        <h1 class="fw-light m-0" style="padding: 11px 35px; font-size: 42px;">Moja klasa</h1>

                    </div>
                </a>

            </div>

        </div>
        <div class="w-50" style="position: relative;">

            <div class="text-end" style="width: 100%; height: 230px; position: absolute; bottom: 0; padding-right: 5vw;">

                <div class="d-inline-block" style="background-color: white; border-radius: 17px; color: black;">

                    <h1 class="m-0 time" style="padding: 11px 50px; font-size: 53px; font-weight: 400;">00:00</h1>

                </div>

                <div class="d-inline-block mt-4" style="background-color: white; border-radius: 17px; color: black;">

                    <h1 class="m-0 date" style="padding: 11px 35px; font-size: 40px; font-weight: 400;">00 kwietnia 0000</h1>

                </div>

            </div>

        </div>

    </div>

<script>

    let widths = document.querySelectorAll('.width')

    widths.forEach(width => {
        width.style.width = document.querySelector('.pwidth').offsetWidth+'px'
    });

    function updateTime() {
        let currentTime = new Date();

        let hours = currentTime.getHours();
        let minutes = currentTime.getMinutes();
        let seconds = currentTime.getSeconds();

        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        let formattedTime = hours + ":" + minutes;

        document.querySelector('.time').innerHTML = formattedTime
    }

    setInterval(updateTime, 5000);

    updateTime();

    function getMonthName(monthIndex) {
        const months = [
            "stycznia", "lutego", "marca", "kwietnia", "maja", "czerwca",
            "lipca", "sierpnia", "września", "października", "listopada", "grudnia"
        ];
        return months[monthIndex];
    }

    function updateDateTime() {
        let currentDateTime = new Date();

        let day = currentDateTime.getDate();
        let month = getMonthName(currentDateTime.getMonth());
        let year = currentDateTime.getFullYear();

        let hours = currentDateTime.getHours();
        let minutes = currentDateTime.getMinutes();
        let seconds = currentDateTime.getSeconds();

        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;

        let formattedDate = day + " " + month + " " + year;

        document.querySelector('.date').innerHTML = formattedDate
    }

    setInterval(updateDateTime, 10000);

    updateDateTime();

</script>

@endsection
