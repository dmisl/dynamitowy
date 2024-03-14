<script setup>

</script>

<template>
    <div class="d-flex" style="height: 100%;">

        <div style="height: 100%;">
            <div class="col-md-3 bg-info bg-gradient" style="position: fixed; height: 100vh;">
                <div class="user-select-none">

                    <a href="{{ route('warning.index') }}" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Lista uwag
                        </div>
                    </a>
                    <a href="{{ route('warning.classroom') }}" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Lista uwag klasy
                        </div>
                    </a>
                    <a href="{{ route('warning.create', [0]) }}" class="text-decoration-none text-dark">
                        <div class="w-100 ps-2 fs-5 border-bottom border-dark">
                            Dodac uwage
                        </div>
                    </a>

                </div>
            </div>
        </div>
        <div class="col-md-3"></div>


        <div class="col-md-9">

            <div class="p-3">

                <h1 class="fw-medium">Lista uwag</h1>

                <div class="w-100 mx-auto">

                    <!-- @if($warnings->count() !== 0)
                        @foreach($warnings as $warning)
                            <div class="w-100 rounded-3 mt-2 mx-auto bg-secondary-subtle border p-2 row justify-content-between">
                                <div class="col">
                                    <p class="fs-4 m-0 p-0">Uczen:</p>
                                    <p class="fs-5 fw-medium m-0 p-0">{{ $warning->user->name }} - {{ $warning->user->classroom->name }}</p>
                                    <p class="small text-secondary m-0 p-0">{{ $warning->date }}</p>
                                </div>
                                <div class="col">
                                    <p class="fs-4 m-0 p-0">Opis:</p>
                                    <p class="fs-6 fw-medium m-0 p-0 text-wrap">{{ $warning->desc }}</p>
                                </div>
                                <div class="col">
                                    <a href="{{ route('warning.show', [$warning->id]) }}">Show</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-center fw-light">W tym momencie nie dodano zadnej uwagi</h2>
                    @endif -->

                </div>

            </div>

        </div>
    </div>

</template>