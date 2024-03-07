<div style="height: 100%;">
    <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
        <div class="user-select-none">

            <a href="{{ route('warning.index') }}" class="text-decoration-none text-dark">
                <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                    Lista uwag
                </div>
            </a>
            @if(Auth::user()->teacher->classroom)
                <a href="{{ route('warning.classroom') }}" class="text-decoration-none text-dark">
                    <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                        Lista uwag klasy
                    </div>
                </a>
            @endif
            <a href="{{ route('warning.create', [0]) }}" class="text-decoration-none text-dark">
                <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                    Dodac uwage
                </div>
            </a>

        </div>
    </div>
</div>
<div class="col-md-3"></div>
