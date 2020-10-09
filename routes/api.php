<?php

use App\Http\Controllers\Api\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => ['auth:sanctum'],
    'namespace' => 'Api',
    'prefix' => 'notes',
], function ($router) {
    Route::get('list', [NoteController::class, 'list'])->name('notes.list');
    Route::get('inspire', [NoteController::class, 'inspire'])->name('notes.inspire');
    Route::get('count', [NoteController::class, 'count'])->name('notes.count');
});
