<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home.index');

    // LOGOUT
    Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');

});

Route::middleware('teacher')
->group(function () {

    // views
    Route::get('journal', [JournalController::class, 'index'])->name('journal.index');
    Route::get('journal/classroom', [ClassroomController::class, 'index'])->name('classroom.index');
    Route::get('journal/classroom/{id}', [ClassroomController::class, 'show'])->name('classroom.show');
    Route::get('journal/classroom/{id}/edit', [ClassroomController::class, 'edit'])->name('classroom.edit');
    // posts
    Route::post('journal/classroom/update', [ClassroomController::class, 'update'])->name('classroom.update');

});

Route::middleware('guest')
->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');

});

Route::fallback(function () {
    return redirect()->route('home.index');
});

