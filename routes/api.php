<?php

use App\Http\Resources\ClassroomResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\WarningResource;
use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\User;
use App\Models\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/users', function () {
    return UserResource::collection(User::all());
});
Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
});
Route::get('/students', function () {
    return UserResource::collection(User::query()->where(['role_id' => 1])->get());
});
Route::get('/teachers', function () {
    return new UserResource(User::query()->where(['role_id' => 2])->get());
});
Route::get('/lesson/{id}', function (string $id) {
    return new LessonResource(Lesson::findOrFail($id));
});
Route::get('/lessons', function () {
    return LessonResource::collection(Lesson::all());
});
Route::get('/classroom/{id}', function (string $id) {
    return new ClassroomResource(Classroom::findOrFail($id));
});
Route::get('/classrooms', function () {
    return ClassroomResource::collection(Classroom::all());
});
Route::get('/classroomUsers/{classroom_id}', function (string $classroom_id) {
    return ClassroomResource::collection(Classroom::find($classroom_id)->users);
});
Route::get('classroomLessons/{classroom_id}/{day}', function (string $classroom_id, string $day) {
    return ClassroomResource::collection(Classroom::find($classroom_id)->lessons()->where('day', $day)->get());
});
Route::get('/subject/{id}', function (string $id) {
    return new SubjectResource(Subject::findOrFail($id));
});
Route::get('/subjects', function () {
    return SubjectResource::collection(Subject::all());
});
Route::get('/todayLessons/{id}', function (string $id) {
    $subjects = Subject::query()->where(['teacher_id' => $id-1])->get('id');
    $lessons = Lesson::query()->where(['day' => date('N')])->whereIn('subject_id', $subjects)->get()->toJson();
    return $lessons;
});
Route::get('/warning/{id}', function (string $id) {
    return new WarningResource(Warning::findOrFail($id));
});
Route::get('/warnings', function () {
    return WarningResource::collection(Warning::all());
});
Route::get('/classroomWarnings/{id}', function (string $id) {
    return WarningResource::collection(Warning::query()->where(['classroom_id' => $id])->get());
});

