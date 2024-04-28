@extends('layouts.chat')

@section('title', 'Wiadomości')

@section('content')

    <a href="{{ route('home.index') }}">Wrócz</a>

    <chat-parent :prefix="'{{ asset('') }}'" :auth="{{ Auth::id() }}" :redirect="{{ $redirect }}"></chat-parent>

@endsection
