<?php

use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [StudentsController::class, 'index'])->name('student-index');
Route::get('create-student', [StudentsController::class, 'create']);
Route::post('student-index', [StudentsController::class, 'store'])->name('student.index');
Route::get('delete-data{student_id}', [StudentsController::class, 'delete']);
Route::get('edit-data{student_id}', [StudentsController::class, 'edit']);
Route::put('update-data{id}', [StudentsController::class, 'update'])->name('update-student');
Route::get('show-data{student_id}', [StudentsController::class, 'show']);
