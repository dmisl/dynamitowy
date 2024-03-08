@extends('layouts.main')

@section('title', 'Dziennik')

@section('content')

    <div class="w-100 text-start pb-5">

        <h2>Rozklad lekcji</h2>

        <div class="mt-4">
            <h4 class="fw-light">Poniedzialek</h4>

            <table class="table">

                <tr>
                    <th>Nr.</th>
                    <th>Pocz</th>
                    <th>Kon</th>
                    <th>Nazwa lekcji</th>
                    <th>Nauczyciel</th>
                </tr>

                @foreach ($user->classroom->lessons()->where('day', '1')->get() as $lesson)
                    <tr>
                        <td>{{ $lesson->lesson_number }}</td>
                        <td>{{ $timetable[$lesson->lesson_number] }}</td>
                        <td>{{ $timetableEnd[$lesson->lesson_number] }}</td>
                        <td>{{ $lesson->subject->name }}</td>
                        <td>{{ $lesson->subject->teacher->user->name }}</td>
                    </tr>
                @endforeach

            </table>

        </div>

        <div class="mt-4">
            <h4 class="fw-light">Wtorek</h4>

            <table class="table">

                <tr>
                    <th>Nr.</th>
                    <th>Pocz</th>
                    <th>Kon</th>
                    <th>Nazwa lekcji</th>
                    <th>Nauczyciel</th>
                </tr>

                @foreach ($user->classroom->lessons()->where('day', '2')->get() as $lesson)
                    <tr>
                        <td>{{ $lesson->lesson_number }}</td>
                        <td>{{ $timetable[$lesson->lesson_number] }}</td>
                        <td>{{ $timetableEnd[$lesson->lesson_number] }}</td>
                        <td>{{ $lesson->subject->name }}</td>
                        <td>{{ $lesson->subject->teacher->user->name }}</td>
                    </tr>
                @endforeach

            </table>

        </div>

        <div class="mt-4">
            <h4 class="fw-light">Sroda</h4>

            <table class="table">

                <tr>
                    <th>Nr.</th>
                    <th>Pocz</th>
                    <th>Kon</th>
                    <th>Nazwa lekcji</th>
                    <th>Nauczyciel</th>
                </tr>

                @foreach ($user->classroom->lessons()->where('day', '3')->get() as $lesson)
                    <tr>
                        <td>{{ $lesson->lesson_number }}</td>
                        <td>{{ $timetable[$lesson->lesson_number] }}</td>
                        <td>{{ $timetableEnd[$lesson->lesson_number] }}</td>
                        <td>{{ $lesson->subject->name }}</td>
                        <td>{{ $lesson->subject->teacher->user->name }}</td>
                    </tr>
                @endforeach

            </table>

        </div>

        <div class="mt-4">
            <h4 class="fw-light">Czwartek</h4>

            <table class="table">

                <tr>
                    <th>Nr.</th>
                    <th>Pocz</th>
                    <th>Kon</th>
                    <th>Nazwa lekcji</th>
                    <th>Nauczyciel</th>
                </tr>

                @foreach ($user->classroom->lessons()->where('day', '4')->get() as $lesson)
                    <tr>
                        <td>{{ $lesson->lesson_number }}</td>
                        <td>{{ $timetable[$lesson->lesson_number] }}</td>
                        <td>{{ $timetableEnd[$lesson->lesson_number] }}</td>
                        <td>{{ $lesson->subject->name }}</td>
                        <td>{{ $lesson->subject->teacher->user->name }}</td>
                    </tr>
                @endforeach

            </table>

        </div>

        <div class="mt-4">
            <h4 class="fw-light">Piatek</h4>

            <table class="table">

                <tr>
                    <th>Nr.</th>
                    <th>Pocz</th>
                    <th>Kon</th>
                    <th>Nazwa lekcji</th>
                    <th>Nauczyciel</th>
                </tr>

                @foreach ($user->classroom->lessons()->where('day', '5')->get() as $lesson)
                    <tr>
                        <td>{{ $lesson->lesson_number }}</td>
                        <td>{{ $timetable[$lesson->lesson_number] }}</td>
                        <td>{{ $timetableEnd[$lesson->lesson_number] }}</td>
                        <td>{{ $lesson->subject->name }}</td>
                        <td>{{ $lesson->subject->teacher->user->name }}</td>
                    </tr>
                @endforeach

            </table>

        </div>

    </div>

@endsection
