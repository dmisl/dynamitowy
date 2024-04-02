<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GradeReasonController;
use App\Http\Controllers\HeadmasterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WarningController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
->group(function () {

    Route::get('home', [HomeController::class, 'index'])->name('home.index');

    Route::middleware('student')
    ->group(function () {
        Route::get('profile/{redirect?}', [ProfileController::class, 'index'])->name('profile.index');
    });

    // LOGOUT
    Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');

});

Route::middleware('teacher')
->group(function () {

    Route::get('journal', [JournalController::class, 'index'])->name('journal.index');

    Route::post('lesson/update', [LessonController::class, 'update'])->name('lesson.update');

    Route::post('grade/update', [GradeController::class, 'update'])->name('grade.update');

    Route::post('gradereason/store', [GradeReasonController::class, 'store'])->name('gradereason.store');

    Route::get('warning', [WarningController::class, 'index'])->name('warning.index');

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

Route::middleware('headmaster')
->group(function () {

    Route::get('headmaster/{redirect?}', [HeadmasterController::class, 'index'])->name('headmaster.index');

    Route::post('grade/update', [GradeController::class, 'update'])->name('grade.update');

    Route::post('gradereason/store', [GradeReasonController::class, 'store'])->name('gradereason.store');

    Route::post('lesson/update', [LessonController::class, 'update'])->name('lesson.update');

    Route::post('warning/store', [WarningController::class, 'store'])->name('warning.store');
    Route::post('warning/update', [WarningController::class, 'update'])->name('warning.update');
    Route::post('warning/delete', [WarningController::class, 'delete'])->name('warning.delete');

    Route::post('classroom/store', [ClassroomController::class, 'store'])->name('classroom.store');
    Route::post('classroom/remove', [ClassroomController::class, 'remove'])->name('classroom.remove');
    Route::post('classroom/new_classroom', [ClassroomController::class, 'new_classroom'])->name('classroom.new_classroom');
    Route::post('classroom/teacher_update', [ClassroomController::class, 'teacher_update'])->name('classroom.teacher_update');
    Route::post('classroom/timetable_update', [ClassroomController::class, 'timetable_update'])->name('classroom.timetable_update');

    Route::post('teacher/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::post('teacher/update', [TeacherController::class, 'update'])->name('teacher.update');
    Route::post('teacher/delete', [TeacherController::class, 'delete'])->name('teacher.delete');

    Route::post('subject/store', [SubjectController::class, 'store'])->name('subject.store');

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
