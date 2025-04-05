<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/news', [MainController::class,'news'])->name('news');
Route::get('/news/{new}', [MainController::class,'newsShow'])->name('news.show');
Route::get('/courses', [MainController::class,'courseIndex'])->name('kurslar.index');
Route::get('/courses/{course}', [MainController::class,'courseShow'])->name('kurslar.show');
Route::get('contact', [MainController::class, 'contact'])->name('contact');


Route::middleware(['auth'])->get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

Route::prefix('admin')->group(function () {

    Route::middleware('auth')->group(function () {

        Route::resources([
            'students' => StudentController::class,
            'teachers' => TeacherController::class,
            'groups' => GroupController::class,
            'courses' => CourseController::class,
           
            'grades' => GradeController::class,
            'payments' => PaymentController::class,
            'rooms' => RoomController::class,
            'floors' => FloorController::class,
            'posts' => PostController::class,
        ]);
    });
    Route::prefix('my-groups')->group(function () {
        Route::resource( 'lessons', LessonController::class,);
    });
});


require __DIR__ . '/auth.php';
