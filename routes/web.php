<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\HomeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/add-sales', [App\Http\Controllers\HomeController::class, 'store'])->name('add-sales');
Route::post('/update-sales', [App\Http\Controllers\HomeController::class, 'update'])->name('update-sales');
Route::post('/delete-sales', [App\Http\Controllers\HomeController::class, 'destroy'])->name('delete-sales');

Route::get('/generate', [ReportController::class, 'generate']);
Route::post('/generate-report', [ReportController::class, 'generateReport']);
