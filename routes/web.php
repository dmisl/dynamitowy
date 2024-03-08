<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeReasonController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WarningController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home.index');

    Route::middleware('student')
    ->group(function () {
        Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('profile/grades', [ProfileController::class, 'grades'])->name('profile.grades');
        Route::get('profile/timetable', [ProfileController::class, 'timetable'])->name('profile.timetable');
        Route::get('profile/warnings', [ProfileController::class, 'warnings'])->name('profile.warnings');
    });

    // LOGOUT
    Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');

});

Route::middleware('teacher')
->group(function () {

    Route::get('journal', [JournalController::class, 'index'])->name('journal.index');
    Route::get('lesson/{id}/{date}/show', [LessonController::class, 'show'])->name('lesson.show');
    Route::get('lesson/{lesson_id}/{classroom_id}/{date}/edit', [LessonController::class, 'edit'])->name('lesson.edit');

    Route::post('lesson/update', [LessonController::class, 'update'])->name('lesson.update');

    Route::get('grade/{classroom_id}/{subject_id}/show', [GradeController::class, 'show'])->name('grade.show');
    Route::get('grade/{classroom_id}/{subject_id}/edit', [GradeController::class, 'edit'])->name('grade.edit');

    Route::post('gradereason', [GradeReasonController::class, 'store'])->name('gradereason.store');

    Route::get('warning', [WarningController::class, 'index'])->name('warning.index');
    Route::get('warning/classroom', [WarningController::class, 'classroom'])->name('warning.classroom');
    Route::get('warning/{user_id}/show', [WarningController::class, 'show'])->name('warning.show');
    Route::get('warning/{user_id}/create', [WarningController::class, 'create'])->name('warning.create');

    Route::post('warning/store', [WarningController::class, 'store'])->name('warning.store');

    Route::middleware('classroom_teacher')
    ->prefix('journal/classroom')
    ->group(function () {

        Route::get('/', [ClassroomController::class, 'index'])->name('classroom.index');
        Route::get('/create', [ClassroomController::class, 'create'])->name('classroom.create');
        Route::get('/show/{id}', [ClassroomController::class, 'show'])->name('classroom.show');
        Route::get('/{id}/edit', [ClassroomController::class, 'edit'])->name('classroom.edit');
        Route::get('/timetable', [ClassroomController::class, 'timetable'])->name('classroom.timetable');
        Route::get('/timetableedit', [ClassroomController::class, 'timetable_edit'])->name('classroom.timetable.edit');
        Route::post('/store', [ClassroomController::class, 'store'])->name('classroom.store');
        Route::post('/timetableupdate', [ClassroomController::class, 'timetable_update'])->name('classroom.timetable.update');
        Route::post('/update', [ClassroomController::class, 'update'])->name('classroom.update');

    });

});

Route::middleware('guest')
->group(function () {

    Route::get('login', [LoginController::class, 'index'])->name('login.index');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
    Route::post('hints', [LoginController::class, 'hints'])->name('hints.store');

});

Route::fallback(function () {
    return redirect()->route('home.index');
});

Route::get('test', [TestController::class, 'index'])->name('test.index');
Route::post('test_message', [TestController::class, 'message'])->name('test.message');
