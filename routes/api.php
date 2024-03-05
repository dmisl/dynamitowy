<?php

use App\Http\Resources\ClassroomResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\UserResource;
use App\Models\Classroom;
use App\Models\Lesson;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
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

Route::get('/user/{id}', function (string $id) {
    return new UserResource(User::findOrFail($id));
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
Route::get('/subject/{id}', function (string $id) {
    return new SubjectResource(Subject::findOrFail($id))
});
Route::get('/subjects', function () {
    return SubjectResource::collection(Subject::all());
});