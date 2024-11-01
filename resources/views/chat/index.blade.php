@extends('layouts.main')

@section('title', 'Wiadomości')

@section('content')

    <div style="margin-top: 20vh;">

        <a href="{{ route('home.index') }}">Wrócz</a>

        <chat-parent :prefix="'{{ asset('') }}'" :auth="{{ Auth::id() }}" :redirect="{{ $redirect }}"></chat-parent>

    </div>

@endsection
