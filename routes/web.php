<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

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
Route::get('/sales', [App\Http\Controllers\SalesController::class, 'index'])->name('sales');
Route::get('/sales-update', [App\Http\Controllers\SalesController::class, 'index'])->name('update-sales');
Route::get('/sales-delete', [App\Http\Controllers\SalesController::class, 'index'])->name('delete-sales');

Route::get('/generate', [ReportController::class, 'generate']);
Route::post('/generate-report', [ReportController::class, 'generateReport']);
