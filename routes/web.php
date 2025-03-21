<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MainControler;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainControler::class, 'index'])->name('home');


Route::middleware(['auth', 'verified'])->get('/dashboard', [MainControler::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::resources([
        'students' => StudentController::class,
        'teachers' => TeacherController::class,
        'groups' => GroupController::class,
        'courses' => CourseController::class,
        'lessons' => LessonController::class,
        'grades' => GradeController::class,
        'payments' => PaymentController::class,
        'rooms' => RoomController::class,
        'floors' => FloorController::class,
        'posts' => PostController::class,
    ]);
    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/students', [ReportController::class, 'studentsReport']);
    Route::get('/reports/courses', [ReportController::class, 'coursesReport']);
    Route::get('/reports/payments', [ReportController::class, 'paymentsReport']);
});

require __DIR__ . '/auth.php';
