<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddSubController;
use App\Http\Controllers\addTaskController;
use App\Http\Controllers\addExamCOntroller;
use App\Models\addSub;
use App\Models\addTask;
use App\Models\addExam;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\auth;

Route::get('/register', [AuthController::class, 'showRegister']);
Route::get('/login', [AuthController::class, 'showLogin']);

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    $subjects = addSub::where('user_id', auth::id())->get();
    $tasks=addTask::where('user_id', auth::id())->get();
    $exam=addExam::where('user_id', auth::id())->get();
    $totalexams=addExam::where('user_id', auth::id())->count();
    $exams = addExam::where('user_id',auth::id())->whereDate('date', '>=', today())
                ->orderBy('date', 'asc')
                ->get();
    $nextExam = addExam::where("user_id",auth::id())->whereDate('date', '>=', today())
                ->orderBy('date', 'asc')
                ->first();
    $completedExams=$totalexams-$exams->count();
    $pendingTasks = addTask::where('user_id',auth::id())->where('completed', false)->count();
    $completedTasks=addTask::where('user_id', auth::id())->where('completed',true)->count();
    return view('welcome', compact('subjects','tasks','exam','totalexams','exams','nextExam','completedExams','pendingTasks',"completedTasks"));
})->middleware('auth');

Route::post('/task/{id}/complete', [addTaskController::class, 'complete']);

Route::get('/sub', [AddSubController::class, 'showform'])->middleware('auth');
Route::post('/Subject', [AddSubController::class, 'add']);


Route::get('/tasks', [AddTaskController::class, 'showform'])
->middleware('auth','checkSUbject');
Route::post('/task', [AddTaskController::class, 'add']);

Route::get('/exams', [AddExamCOntroller::class, 'showform'])
->middleware('auth','checkSUbject');
Route::post('/exam', [AddExamCOntroller::class, 'add']);

Route::get('/ManageSubjects', [AddSubController::class, 'manage'])
->middleware('auth');  

Route::get('/Sub/{id}/edit', [AddSubController::class, 'edit']);
Route::put('/Sub/{id}/update', [AddSubController::class, 'update']);
Route::delete('/Sub/{id}/delete', [AddSubController::class, 'delete']);


Route::get('/ManageTasks', [AddTaskController::class, 'manage'])
->middleware('auth');

Route::get('/Task/{id}/edit', [AddTaskController::class, 'edit']);
Route::put('/Task/{id}/update', [AddTaskController::class, 'update']);
Route::delete('/Task/{id}/delete', [AddTaskController::class, 'delete']);

Route::get('/ManageExams', [AddExamController::class, 'manage'])
->middleware('auth');


Route::get('/Exam/{id}/edit', [AddExamController::class, 'edit']);
Route::put('/Exam/{id}/update', [AddExamController::class, 'update']);
Route::delete('/Exam/{id}/delete', [AddExamController::class, 'delete']);

