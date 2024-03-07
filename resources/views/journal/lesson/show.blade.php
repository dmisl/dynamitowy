@use('App\Models\Presence')

@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">

        <x-lessons-menu :lessons="$lessons" :timetable="$timetable"></x-classroom-menu>

        <div class="col-md-9">

            <div class="p-3">

                <table class="table table-primary table-bordered">
                    <tr>
                        <th>Imie Nazwisko</th>
                        @foreach($classroom->lessons()->where('day', $currentLesson->day)->orderBy('lesson_number', 'asc')->get() as $lesson)
                            <th>{{ $timetable[$lesson->lesson_number] }}</th>
                        @endforeach
                    </tr>
                    @foreach($classroom->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            @foreach($user->classroom->lessons()->where('day', $currentLesson->day)->orderBy('lesson_number', 'asc')->get() as $lesson)
                                @php($currentLesson->id == $lesson->id ? $bordered = 'table-success' : $bordered = 'table-primary')
                                @if($user->presences()->where('lesson_id', $lesson->id)->where('date', $date)->get()->count() == 0)
                                    @php(Presence::create(['date' => $date, 'lesson_id' => $lesson->id, 'classroom_id' => $classroom->id, 'user_id' => $user->id, 'presence_type_id' => '7', 'lesson_number' => $lesson->lesson_number]))
                                @endif
                                <td class="{{ $bordered }} text-center">{!! $user->presences()->where('lesson_id', $lesson->id)->where('date', $date)->first()->presenceType->text !!}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </table>

                <a href="{{ route('lesson.edit', [$currentLesson->id, $classroom->id, $date]) }}" class="btn brn-lg btn-primary">Edytowac</a>
                <a href="{{ route('grade.show', [$classroom->id, $currentLesson->subject->id]) }}" class="btn brn-lg btn-primary ms-5">Oceny</a>

            </div>

        </div>
    </div>

@endsection
