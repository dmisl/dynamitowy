@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">
        <div class="col-md-3 bg-info bg-gradient">
            <div class="user-select-none">
                <select class="form-select rounded-0">
                    <option value="">{{ $date }}</option>
                </select>
                @foreach($lessons as $lesson)
                    <a class="text-decoration-none text-dark" href="{{ route('lesson.show', [$lesson->id, $date]) }}">
                        <div class="m-0 p-0 border-bottom border-dark">
                            <p class="p-0 m-0 ps-1 pt-1 fw-medium">{{ $lesson->classroom->name }} - {{ $timetable[$lesson->lesson_number] }}</p>
                            <p class="p-0 m-0 ps-1 small text-wrap">{{ $lesson->subject->name }}</p>
                        </div>
                    </a>
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
                        @endforeach
                    </tr>

                    {{-- SHOWING EACH USER AND HIS PRESENCES ON LESSONS --}}
                    @foreach($classroom->users as $student)
                        <tr>
                            {{-- STUDENTS NAME --}}
                            <td>
                                {{ $student->name }}
                            </td>
                            @foreach($student->classroom->lessons()->where('day', $day)->orderBy('lesson_number', 'asc')->get() as $lesson)
                                @php($currentLesson->id == $lesson->id ? $bordered = 'table-success' : $bordered = '')
                                <td class="text-center {{ $bordered }}">
                                    @if($lesson->presences()->where('user_id', $student->id)->where('date', $date)->get()->count() == 0)
                                        @php(App\Models\Presence::create(['date' => $date, 'lesson_id' => $lesson->id, 'classroom_id' => $classroom->id, 'lesson_number' => $lesson->lesson_number, 'user_id' => $student->id, 'type' => 7]))
                                    @endif
                                    @php($presence = $lesson->presences()->where('user_id', $student->id)->where('date', $date)->first())
                                    {!! $presenceTypes[$presence->type-1]['text'] !!}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>

                <a href="{{ route('lesson.edit', [$currentLesson->id, $classroom->id, $date]) }}" class="btn brn-lg btn-primary">Edytowac</a>
                <a href="{{ route('grade.show') }}" class="btn brn-lg btn-primary ms-5">Oceny</a>

            </div>

        </div>
    </div>

@endsection
