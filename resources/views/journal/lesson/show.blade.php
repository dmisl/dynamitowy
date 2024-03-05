@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">
        <div class="col-md-3 bg-info bg-gradient">
            <div class="user-select-none">
                <select class="form-select rounded-0">
                    <option value="">{{ $date }}</option>
                </select>
                {{-- @foreach($lessons as $lesson) --}}
                    {{-- <a class="text-decoration-none text-dark" href="{{ route('lesson.show', [$lesson->id, $date]) }}"> --}}
                        {{-- <div class="m-0 p-0 border-bottom border-dark">
                            <p class="p-0 m-0 ps-1 pt-1 fw-medium">{{ $lesson->classroom->name }} - {{ $timetable[$lesson->lesson_number] }}</p>
                            <p class="p-0 m-0 ps-1 small text-wrap">{{ $lesson->subject->name }}</p>
                        </div> --}}
                        <lessons-navigate></lessons-navigate>
                    {{-- </a> --}}
                {{-- @endforeach --}}
            </div>
        </div>
        <div class="col-md-9">

            <div class="p-3">

                

                <a href="{{ route('lesson.edit', [$currentLesson->id, $classroom->id, $date]) }}" class="btn brn-lg btn-primary">Edytowac</a>
                {{-- <a href="{{ route('grades.edit', $currentLesson->id) }}" class="btn brn-lg btn-primary ms-5">Oceny</a> --}}

            </div>

        </div>
    </div>

@endsection
