<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditorController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SliderController;
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
Route::get('index', [FrontendController::class, 'index']);
//Route::get('dashboard', [DashboardController::class, 'index']);
Route::post('create', [SliderController::class, 'store'])->name('slider');
Route::post('editor', [EditorController::class, 'store'])->name('editor');
Route::get('/dashboard', [EditorController::class, 'index']);
Route::get('edit/{id}', [EditorController::class, 'edit'])->name('edit');
Route::post('update/{id}', [EditorController::class, 'update'])->name('update');
Route::get('delete/editor/image', [EditorController::class, 'deleteEditorImage'])->name('deleteEditorImage');
