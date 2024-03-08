@extends('layouts.main')

@section('title', 'Dziennik')

@section('content')

    <div class="w-100 text-start">

        @if($user->grades->count() !== 0)

            <div class="mt-3">
                <h2>Matematyka</h2>
                <table class="table">
                    <tr>
                        <th>Ocena</th>
                        <th>Opis</th>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td class="w-50 fw-light">Dobre zachowanie</td>
                    </tr>
                </table>
            </div>

            <div class="mt-3">
                <h2>Programowanie obiektowe</h2>
                <table class="table">
                    <tr>
                        <th>Ocena</th>
                        <th>Opis</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td class="w-50 fw-light">BHP</td>
                    </tr>
                </table>
            </div>

        @else

            <h3 class="text-center fw-light">W tym momencie nie dostales zadnej oceny</h3>

        @endif

    </div>

@endsection
