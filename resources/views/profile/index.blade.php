@extends('layouts.main')

@section('title', 'Profil | Dynamitowy')

@section('content')

    <profile-parent :user_id="{{ Auth::id() }}" :redirect="{{ $redirect }}"></profile-parent>

@endsection
