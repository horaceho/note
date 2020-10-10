<?php

use App\Http\Controllers\NoteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('notes', [NoteController::class, 'index'])->name('notes');
Route::middleware(['auth:sanctum', 'verified'])->get('count', [NoteController::class, 'count'])->name('count');
Route::middleware(['auth:sanctum', 'verified'])->post('comment', [NoteController::class, 'comment'])->name('comment');
