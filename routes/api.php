<?php

use App\Http\Resources\ClassroomResource;
use App\Http\Resources\GradeResource;
use App\Http\Resources\LessonResource;
use App\Http\Resources\MessageResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\WarningResource;
use App\Models\Classroom;
use App\Models\Grade;
use App\Models\GradeReason;
use App\Models\GradeType;
use App\Models\Lesson;
use App\Models\Message;
use App\Models\Presence;
use App\Models\PresenceType;
use App\Models\Subject;
use App\Models\Teacher;
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

// USERS
    Route::get('/users', function () {
        return UserResource::collection(User::all());
    });
    Route::get('/user/{id}', function (string $id) {
        return new UserResource(User::findOrFail($id));
    });
    Route::get('/students', function () {
        return UserResource::collection(User::query()->where(['role_id' => 1])->get());
    });
    Route::get('/teacher/{id}', function (string $id) {
        return new UserResource(Teacher::findOrFail($id));
    });
    Route::get('/teachersModel', function () {
        return UserResource::collection(Teacher::all());
    });
    Route::get('/teachers', function () {
        return new UserResource(User::query()->where(['role_id' => 2])->get());
    });
    Route::get('/classroomUsers/{classroom_id}', function (string $classroom_id) {
        return ClassroomResource::collection(Classroom::find($classroom_id)->users()->orderBy('name', 'asc')->get());
    });
// LESSONS
    Route::get('/lesson/{id}', function (string $id) {
        return new LessonResource(Lesson::findOrFail($id));
    });
    Route::get('/lessons', function () {
        return LessonResource::collection(Lesson::all());
    });
    Route::get('allClassroomLessons/{classroom_id}', function ($classroom_id) {
        return ClassroomResource::collection(Classroom::find($classroom_id)->lessons);
    });
    Route::get('classroomLessons/{classroom_id}/{day}', function (string $classroom_id, string $day) {
        return ClassroomResource::collection(Classroom::find($classroom_id)->lessons()->where('day', $day)->get());
    });
    Route::get('/todayLessons/{id}/{date}', function (string $id, string $date = '0') {
        if($date == 0)
        {
            $date = date('N') <= 5 ? date('N') : 1;
        }
        $subjects = Subject::query()->where(['teacher_id' => $id])->get('id');
        $lessons = Lesson::query()->where(['day' => $date])->whereIn('subject_id', $subjects)->orderBy('lesson_number', 'asc')->get();
        return LessonResource::collection($lessons);
    });
// CLASSROOM
    Route::get('/classroom/{id}', function (string $id) {
        return new ClassroomResource(Classroom::findOrFail($id));
    });
    Route::get('/classrooms', function () {
        return ClassroomResource::collection(Classroom::all());
    });
    Route::get('has_classroom/{teacher_id}', function (string $teacher_id) {
        return new ClassroomResource(Classroom::query()->where(['teacher_id' => $teacher_id])->first());
    });
// PRESENCE / PRESENCE TYPES
    Route::get('classroomPresence/{classroom_id}/{day}/{date}', function (string $classroom_id, string $day, string $date) {
        $classroom = Classroom::find($classroom_id);
        $lessons = $classroom->lessons()->where('day', $day)->get();
        $lessonIDs = $classroom->lessons()->where('day', $day)->get('id');
        $presences = $classroom->presences()->whereIn('lesson_id', $lessonIDs)->where('date', $date)->get();
        if($presences->count() == 0)
        {
            foreach ($classroom->users as $user) {

                foreach ($lessons as $lesson) {

                    Presence::create([
                        'date' => $date,
                        'lesson_id' => $lesson->id,
                        'classroom_id' => $classroom->id,
                        'user_id' => $user->id,
                        'presence_type_id' => 7,
                        'lesson_number' => $lesson->lesson_number
                    ]);

                }

            }
        }
        $presences = $classroom->presences()->whereIn('lesson_id', $lessonIDs)->where('date', $date)->get();
        return ClassroomResource::collection($presences);
    });
    Route::get('presenceTypes', function ()
    {
        return ClassroomResource::collection(PresenceType::all());
    });
// SUBJECTS
    Route::get('/subject/{id}', function (string $id) {
        return new SubjectResource(Subject::findOrFail($id));
    });
    Route::get('/subjects', function () {
        return SubjectResource::collection(Subject::all());
    });
    Route::get('teacher_subjects/{teacher_id}', function (string $teacher_id) {
        return SubjectResource::collection(Subject::query()->where(['teacher_id' => $teacher_id])->get());
    });
// WARNINGS
    Route::get('/warning/{id}', function (string $id) {
        return new WarningResource(Warning::findOrFail($id));
    });
    Route::get('/warnings', function () {
        return WarningResource::collection(Warning::query()->orderBy('date', 'desc')->get());
    });
    Route::get('/user_warnings/{user_id}', function (string $user_id) {
        return WarningResource::collection(Warning::query()->where(['user_id' => $user_id])->get());
    });
    Route::get('/classroomWarnings/{id}', function (string $id) {
        return WarningResource::collection(Warning::query()->where(['classroom_id' => $id])->get());
    });
// GRADE REASONS / GRADES / GRADE TYPES
    Route::get('/gradeReasons', function () {
        return GradeResource::collection(GradeReason::all());
    });
    Route::get('/gradeReasons/{subject_id}', function (string $subject_id) {
        return GradeResource::collection(GradeReason::query()->where(['subject_id' => $subject_id])->get());
    });
    Route::get('/classroomGradeReasons/{classroom_id}/{subject_id}', function (string $classroom_id, string $subject_id) {
        return GradeResource::collection(GradeReason::query()->where(['subject_id' => $subject_id, 'classroom_id' => $classroom_id])->get());
    });
    Route::get('grades/{classroom_id}/{subject_id}', function (string $classroom_id, string $subject_id) {
        $gradeReasons = GradeReason::query()->where(['classroom_id' => $classroom_id, 'subject_id' => $subject_id])->get('id');
        return GradeResource::collection(Grade::query()->whereIn('grade_reason_id', $gradeReasons)->get());
    });
    Route::get('user_grades/{user_id}', function (string $user_id) {
        return GradeResource::collection(User::find($user_id)->grades);
    });
    Route::get('/gradeTypes', function () {
        return GradeResource::collection(GradeType::all());
    });
// MESSAGES
    Route::get('/messages/{sender}/{receiver}', function (string $sender, string $receiver)
    {
        $messages = Message::query()
                   ->whereIn('sender_id', [$sender, $receiver])
                   ->whereIn('receiver_id', [$sender, $receiver])
                   ->get();
        return MessageResource::collection($messages);
    });
