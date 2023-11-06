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
//     return view('welcome');
// });

Route::get('/', [NoteController::class, 'index']);

Route::get('/myimage', [NoteController::class, 'media']);
Route::delete('/delete-file/{fileId}', [NoteController::class, 'deleteFile'])->name('delete.file');
// Route::get('/delete-file/{fileId}', [NoteController::class, 'deleteFile'])->name('delete.file');

Route::get('/create', [NoteController::class, 'create']);
Route::get('/{note:id}', [NoteController::class, 'show']);
Route::post('/create', [NoteController::class, 'store']);
Route::get('/edit/{note:id}', [NoteController::class, 'edit']);
Route::put('/edit/{note:id}', [NoteController::class, 'update']);
Route::delete('/delete/{note:id}', [NoteController::class, 'destroy']);
Route::post('/upload', [NoteController::class, 'uploadImage'])->name('ckeditor.upload');
