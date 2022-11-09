<?php

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CategoryArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// // studen
// Route::get('student', [StudentController::class, 'index']);
// Route::post('student', [StudentController::class, 'store']);
// Route::get('student/{id}', [StudentController::class, 'show']);
// Route::delete('student/{id}', [StudentController::class, 'destroy']);
// Route::put('student/{student}', [StudentController::class, 'update']);
// student
Route::resource('student', StudentController::class)->only([
    'index', 'store', 'show', 'destroy', 'update'
]);

// categoryarticle
Route::get('category_article', [CategoryArticleController::class, 'index']);
Route::post('category_article', [CategoryArticleController::class, 'store']);
Route::post('categoryarticle/{id}', [CategoryArticleController::class, 'update']);
Route::delete('categoryarticle/delete/{id}', [CategoryArticleController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
