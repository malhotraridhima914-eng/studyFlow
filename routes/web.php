<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddSubController;
use App\Http\Controllers\addTaskController;
use App\Http\Controllers\addExamCOntroller;
use App\Models\addSub;
use App\Models\addTask;
use App\Models\addExam;

Route::get('/', function () {
    $subjects = addSub::all();
    $tasks=addTask::all();
    $exam=addExam::all();
    $totalexams=addExam::count();
    $exams = addExam::whereDate('date', '>=', today())
                ->orderBy('date', 'asc')
                ->get();
    $nextExam = addExam::whereDate('date', '>=', today())
                ->orderBy('date', 'asc')
                ->first();
    $completedExams=$totalexams-$exams->count();
    $pendingTasks = addTask::where('completed', false)->count();
    $completedTasks=addTask::where('completed',true)->count();
    return view('welcome', compact('subjects','tasks','exam','totalexams','exams','nextExam','completedExams','pendingTasks',"completedTasks"));
});

Route::post('/task/{id}/complete', [addTaskController::class, 'complete']);

Route::get('/Sub', [AddSubController::class, 'showform']);
Route::post('/Subject', [AddSubController::class, 'add']);


Route::get('/Task', [AddTaskController::class, 'showform']);
Route::post('/task', [AddTaskController::class, 'add']);

Route::get('/Exam', [AddExamCOntroller::class, 'showform']);
Route::post('/exam', [AddExamCOntroller::class, 'add']);

Route::get('/ManageSubjects', [AddSubController::class, 'manage']);  

Route::get('/Sub/{id}/edit', [AddSubController::class, 'edit']);
Route::put('/Sub/{id}/update', [AddSubController::class, 'update']);
Route::delete('/Sub/{id}/delete', [AddSubController::class, 'delete']);


Route::get('/ManageTasks', [AddTaskController::class, 'manage']);

Route::get('/Task/{id}/edit', [AddTaskController::class, 'edit']);
Route::put('/Task/{id}/update', [AddTaskController::class, 'update']);
Route::delete('/Task/{id}/delete', [AddTaskController::class, 'delete']);

Route::get('/ManageExams', [AddExamController::class, 'manage']);


Route::get('/Exam/{id}/edit', [AddExamController::class, 'edit']);
Route::put('/Exam/{id}/update', [AddExamController::class, 'update']);
Route::delete('/Exam/{id}/delete', [AddExamController::class, 'delete']);