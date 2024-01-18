<?php

use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [NoteController::class, 'index']);

Route::post('/note', [NoteController::class, 'store'])->name('note.store');

Route::post('note/delete/{id}', [NoteController::class, 'destroy'])->name('note.destroy');

Route::post('/note/update/{id}', [NoteController::class, 'update'])->name('note.update');

Route::post('/note/change/{id}', [NoteController::class, 'editFinished'])->name('note.finished');