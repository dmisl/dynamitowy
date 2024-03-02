@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">
        <div class="col-md-3 bg-info bg-gradient">
            <div class="user-select-none">
                <select class="form-select rounded-0">
                    <option value="">{{ date('d-m-Y') }}</option>
                </select>
                @foreach($lessons as $lesson)
                    <div class="m-0 p-0 border-bottom border-dark">
                        <p class="p-0 m-0 ps-1 pt-1 fw-medium">{{ $lesson->classroom->name }} - {{ $timetable[$lesson->lesson_number] }}</p>
                        <p class="p-0 m-0 ps-1 small text-wrap">{{ $lesson->subject->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">

            <div class="p-3">

                <table class="table table-primary table-bordered">

                    {{-- TABLE HEADERS + TIMETABLE WITH PRESENCES OF CURRENT CLASSROOM FROM TODAY --}}
                    <tr>
                        <th scope="col">Imie nazwisko ucznia</th>
                        @foreach($classroom->lessons()->where('day', $day)->get() as $lesson)
                            <th>{{ $timetable[$lesson->lesson_number] }}</th>
                            @php($todayLessons[] = $lesson->id)
                        @endforeach
                    </tr>

                    {{-- SHOWING EACH USER AND HIS PRESENCES ON LESSONS --}}
                    @foreach($classroom->users as $student)
                        <tr>
                            {{-- STUDENTS NAME --}}
                            <td>
                                {{ $student->name }}
                            </td>
                            {{-- SHOWING EACH PRESENCE IF THEY ARE AND IF THEY ARE NOT TO CREATE THEM WITH NOT CHOSEN TYPE --}}
                            @if($student->presences()->where('date', '2024-03-04')->get()->count() < $classroom->lessons()->where('day', $day)->get()->count())
                                @foreach($todayLessons as $todayLesson)
                                    <td class="text-center">
                                        @if($presence = $student->presences()->where('date', '2024-03-04')->where('lesson_number', $todayLesson)->first())
                                            @if($presence->type == 1)
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve">

                                                    <defs>
                                                    </defs>
                                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                        <path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 52.87 52.189 C 50.779 54.063 48.156 55 45 55 c -3.196 0 -5.829 -0.947 -7.9 -2.839 c -2.071 -1.894 -3.107 -4.281 -3.107 -7.161 c 0 -2.878 1.036 -5.266 3.107 -7.161 C 39.171 35.947 41.804 35 45 35 c 3.156 0 5.779 0.937 7.87 2.811 c 2.09 1.874 3.136 4.27 3.136 7.189 C 56.007 47.921 54.961 50.317 52.87 52.189 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    </g>
                                                </svg>
                                            @elseif($presence->type == 2)
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve">

                                                    <defs>
                                                    </defs>
                                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                        <path d="M 86.5 48.5 h -83 C 1.567 48.5 0 46.933 0 45 s 1.567 -3.5 3.5 -3.5 h 83 c 1.933 0 3.5 1.567 3.5 3.5 S 88.433 48.5 86.5 48.5 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,29,27); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                        <path d="M 86.5 48.5 h -83 C 1.567 48.5 0 46.933 0 45 s 1.567 -3.5 3.5 -3.5 h 83 c 1.933 0 3.5 1.567 3.5 3.5 S 88.433 48.5 86.5 48.5 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,29,27); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    </g>
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve">

                                                    <defs>
                                                    </defs>
                                                    <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                        <path d="M 63.835 7.659 c -5.257 -5.122 -12.197 -7.834 -19.547 -7.649 C 29.799 0.382 18.012 12.748 18.012 27.574 v 3.955 c 0 0.552 0.448 1 1 1 h 12.334 c 0.552 0 1 -0.448 1 -1 v -4.112 c 0 -6.913 5.419 -12.776 12.081 -13.07 c 3.492 -0.149 6.803 1.088 9.321 3.498 c 2.52 2.411 3.907 5.658 3.907 9.144 v 0.691 c 0 6.893 -5.54 12.517 -12.402 12.652 c -0.081 -0.021 -0.165 -0.032 -0.252 -0.032 c -7.353 0 -13.334 5.982 -13.334 13.334 v 15.237 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 58.096 c 0 -1.86 1.337 -3.468 3.109 -3.739 c 13.043 -1.993 22.879 -13.461 22.879 -26.677 v -0.691 C 71.988 19.647 69.093 12.783 63.835 7.659 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                        <path d="M 45 75.666 H 32.666 c -0.552 0 -1 0.447 -1 1 V 89 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 76.666 C 46 76.113 45.552 75.666 45 75.666 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    </g>
                                                </svg>
                                            @endif
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve">

                                                <defs>
                                                </defs>
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 63.835 7.659 c -5.257 -5.122 -12.197 -7.834 -19.547 -7.649 C 29.799 0.382 18.012 12.748 18.012 27.574 v 3.955 c 0 0.552 0.448 1 1 1 h 12.334 c 0.552 0 1 -0.448 1 -1 v -4.112 c 0 -6.913 5.419 -12.776 12.081 -13.07 c 3.492 -0.149 6.803 1.088 9.321 3.498 c 2.52 2.411 3.907 5.658 3.907 9.144 v 0.691 c 0 6.893 -5.54 12.517 -12.402 12.652 c -0.081 -0.021 -0.165 -0.032 -0.252 -0.032 c -7.353 0 -13.334 5.982 -13.334 13.334 v 15.237 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 58.096 c 0 -1.86 1.337 -3.468 3.109 -3.739 c 13.043 -1.993 22.879 -13.461 22.879 -26.677 v -0.691 C 71.988 19.647 69.093 12.783 63.835 7.659 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    <path d="M 45 75.666 H 32.666 c -0.552 0 -1 0.447 -1 1 V 89 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 76.666 C 46 76.113 45.552 75.666 45 75.666 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        @endif
                                    </td>
                                @endforeach
                            {{-- SHOWING EACH PRESENCE IF ALL OF THEM ARE APPLIED --}}
                            @else
                                @foreach($student->presences()->where('date', '2024-03-04')->get() as $presence)
                                    <td class="text-center">
                                        @if($presence->type == 1)
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve">

                                                <defs>
                                                </defs>
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 52.87 52.189 C 50.779 54.063 48.156 55 45 55 c -3.196 0 -5.829 -0.947 -7.9 -2.839 c -2.071 -1.894 -3.107 -4.281 -3.107 -7.161 c 0 -2.878 1.036 -5.266 3.107 -7.161 C 39.171 35.947 41.804 35 45 35 c 3.156 0 5.779 0.937 7.87 2.811 c 2.09 1.874 3.136 4.27 3.136 7.189 C 56.007 47.921 54.961 50.317 52.87 52.189 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        @elseif($presence->type == 2)
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve">

                                                <defs>
                                                </defs>
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 86.5 48.5 h -83 C 1.567 48.5 0 46.933 0 45 s 1.567 -3.5 3.5 -3.5 h 83 c 1.933 0 3.5 1.567 3.5 3.5 S 88.433 48.5 86.5 48.5 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,29,27); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    <path d="M 86.5 48.5 h -83 C 1.567 48.5 0 46.933 0 45 s 1.567 -3.5 3.5 -3.5 h 83 c 1.933 0 3.5 1.567 3.5 3.5 S 88.433 48.5 86.5 48.5 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29,29,27); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10" viewBox="0 0 256 256" xml:space="preserve">

                                                <defs>
                                                </defs>
                                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                    <path d="M 63.835 7.659 c -5.257 -5.122 -12.197 -7.834 -19.547 -7.649 C 29.799 0.382 18.012 12.748 18.012 27.574 v 3.955 c 0 0.552 0.448 1 1 1 h 12.334 c 0.552 0 1 -0.448 1 -1 v -4.112 c 0 -6.913 5.419 -12.776 12.081 -13.07 c 3.492 -0.149 6.803 1.088 9.321 3.498 c 2.52 2.411 3.907 5.658 3.907 9.144 v 0.691 c 0 6.893 -5.54 12.517 -12.402 12.652 c -0.081 -0.021 -0.165 -0.032 -0.252 -0.032 c -7.353 0 -13.334 5.982 -13.334 13.334 v 15.237 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 58.096 c 0 -1.86 1.337 -3.468 3.109 -3.739 c 13.043 -1.993 22.879 -13.461 22.879 -26.677 v -0.691 C 71.988 19.647 69.093 12.783 63.835 7.659 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                    <path d="M 45 75.666 H 32.666 c -0.552 0 -1 0.447 -1 1 V 89 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 76.666 C 46 76.113 45.552 75.666 45 75.666 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                </g>
                                            </svg>
                                        @endif
                                    </td>
                                @endforeach
                            @endif

                        </tr>
                    @endforeach
                </table>

            </div>

        </div>
    </div>

@endsection
