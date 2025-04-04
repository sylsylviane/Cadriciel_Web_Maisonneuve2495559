<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SetLocaleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FichierController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/ 

// Accueil
Route::get('/', function () {
    return view('welcome');
})->name('accueil');

// Students
Route::get('/students', [StudentController::class, 'index'])->name('students.index')->middleware('auth');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show')->middleware('auth');
Route::get('create/student', [StudentController::class, 'create'])->name('student.create')->middleware('auth');
Route::post('create/student', [StudentController::class, 'store'])->name('student.store')->middleware('auth');
Route::get('/edit/student/{student}', [StudentController::class, 'edit'])->name('student.edit')->middleware('auth');
Route::put('/edit/student/{student}', [StudentController::class, 'update'])->name('student.update')->middleware('auth');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.delete')->middleware('auth');

// Langue
Route::get('/langue/{locale}', [SetLocaleController::class, 'setLocale'])->name('langue');

// Utilisateur
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/registration', [UserController::class, 'create'])->name('user.create');
Route::post('/registration', [UserController::class, 'store'])->name('user.store');
Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');

// Authentification
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');

// Forum
Route::get('/articles', [ArticleController::class, 'index'])->name('article.index')->middleware('auth');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');
Route::get('create/article', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('create/article', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');
Route::get('/edit/article/{article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/edit/article/{article}', [ArticleController::class, 'update'])->name('article.update')->middleware('auth');
Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.delete')->middleware('auth');

// Fichier
Route::get('/files', [FichierController::class, 'index'])->name('file.index')->middleware('auth');
Route::get('/file/{fichier}', [FichierController::class, 'show'])->name('file.show')->middleware('auth');
Route::get('create/file', [FichierController::class, 'create'])->name('file.create')->middleware('auth');
Route::post('create/file', [FichierController::class, 'store'])->name('file.store')->middleware('auth');
Route::get('/edit/file/{fichier}', [FichierController::class, 'edit'])->name('file.edit')->middleware('auth');
Route::put('/edit/file/{fichier}', [FichierController::class, 'update'])->name('file.update')->middleware('auth');
Route::delete('/file/{fichier}', [FichierController::class, 'destroy'])->name('file.delete')->middleware('auth');