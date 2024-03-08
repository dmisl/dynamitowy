@extends('layouts.main')

@section('title', 'Dziennik')

@section('content')

    <div class="w-100 text-start">

        @if($user->warnings->count() !== 0)

            <div class="mt-3">
                <h2>Uwagi</h2>
                <table class="table">
                    <tr>
                        <th>Nauczyciel</th>
                        <th>Data</th>
                        <th>Opis</th>
                    </tr>
                    <tr>
                        <td>Wisniewski Rafal</td>
                        <td>2024-11-11</td>
                        <td class="w-50 fw-light">BHP pedal</td>
                    </tr>
                </table>
            </div>

        @else

            <h3 class="text-center fw-light">W tym momencie nie dostales zadnej uwagi</h3>

        @endif

    </div>

@endsection
