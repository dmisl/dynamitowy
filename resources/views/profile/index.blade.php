@extends('layouts.main')

@section('title', 'Profil | Dynamitowy')

@section('content')

    <profile-parent :redirect="{{ $redirect }}"></profile-parent>

@endsection
