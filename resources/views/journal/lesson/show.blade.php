@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">
        
        <x-classroom-menu :lessons="$lessons" :timetable="$timetable"></x-classroom-menu>
 
        <div class="col-md-9">

            <div class="p-3">

                <table class="table table-primary table-bordered">
                    <tr>
                        <th>Imie Nazwisko</th>
                        {{ dd($classroom->lessons()->where('day', $currentLesson->day)->get()->toArray()) }}
                        {{-- @foreach()

                        @endforeach --}}
                    </tr>
                </table>

                <a href="{{ route('lesson.edit', [$currentLesson->id, $classroom->id, $date]) }}" class="btn brn-lg btn-primary">Edytowac</a>
                <a href="{{ route('grade.show', [$classroom->id, $currentLesson->subject->id]) }}" class="btn brn-lg btn-primary ms-5">Oceny</a>

            </div>

        </div>
    </div>

@endsection
