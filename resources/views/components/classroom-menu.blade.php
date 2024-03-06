<div style="height: 100%;">
    <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
        <div class="user-select-none">
            
            <a href="{{ route('classroom.index') }}" class="text-decoration-none text-dark">
                <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                    Zarzadzanie uczniami
                </div>
            </a>
            <a href="{{ route('classroom.timetable') }}" class="text-decoration-none text-dark">
                <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                    Plan lekcji
                </div>
            </a>
            <a href="{{ route('classroom.timetable.edit') }}" class="text-decoration-none text-dark">
                <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                    Edytowac plan lekcji
                </div>
            </a>
            
        </div>
    </div>
</div>
<div class="col-md-3"></div>