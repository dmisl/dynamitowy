@extends('layouts.journal')

@section('title', 'Dziennik')

@section('content')

    <div class="d-flex" style="height: 100%;">
        <div class="col-md-3 bg-info bg-gradient">
            <div class="user-select-none">
                <select class="form-select rounded-0">
                    <option value="">{{ $today }}</option>
                </select>
                @foreach($lessons as $lesson)
                    <div class="m-0 p-0 border-bottom border-dark">
                        <p class="p-0 m-0 ps-1 pt-1 fw-medium">{{ $lesson->classroom->name }} - {{ $timetable[$lesson->lesson_number] }}</p>
                        <p class="p-0 m-0 ps-1 small text-wrap">{{ App\Models\Subject::find($lesson->subject_id)->name }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-9">

            <div class="p-3">

                <table class="table table-primary">
                    <tr>
                        <th scope="col">Imie nazwisko ucznia</th>
                        @foreach(App\Models\Lesson::query()->where(['classroom_id' => $lessons->first()->classroom_id, 'day' => $lessons->first()->day])->get() as $lesson)
                            <th>{{ $timetable[$lesson->lesson_number] }}</th>
                        @endforeach
                    </tr>
                    <tr class="">
                        <td scope="row">R1C1</td>
                        <td>R1C2</td>
                        <td>R1C3</td>
                    </tr>
                    <tr class="">
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </table>

            </div>

        </div>
    </div>

@endsection
