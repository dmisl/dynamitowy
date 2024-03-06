<div style="height: 100%;">
    <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
        <div class="user-select-none">
            <select class="form-select rounded-0">
                <option value="">{{ date('Y-m-d') }}</option>
            </select>
            @foreach($lessons as $lesson)
                <a class="text-decoration-none text-dark" href="{{ route('lesson.show', [$lesson->id, date('Y-m-d')]) }}">
                    <div class="m-0 p-0 border-bottom border-dark">
                        <p class="p-0 m-0 ps-1 pt-1 fw-medium">{{ $lesson->classroom->name }} - {{ $timetable[$lesson->lesson_number] }}</p>
                        <p class="p-0 m-0 ps-1 small text-wrap">{{ $lesson->subject->name }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
<div class="col-md-3"></div>