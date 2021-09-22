<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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
    return view('index');
});
Route::get('/employee', [EmployeeController::class, 'index'])->name('index');
Route::get('/employee/create',[EmployeeController::class, 'create'])->name('create');
Route::post('/employee',[EmployeeController::class, 'store'])->name('store');
Route::get('/employee/edit/{id}',[EmployeeController::class, 'edit'])->name('edit');
Route::post('/employee/update/{id}',[EmployeeController::class, 'update'])->name('update');
Route::get('/employee/delete/{id}',[EmployeeController::class, 'destroy'])->name('destroy');
Route::get('/exportpdf',[EmployeeController::class, 'exportpdf'])->name('exportpdf');
Route::get('/exportexcel',[EmployeeController::class, 'exportexcel'])->name('exportexcel');
Route::post('/importexcel',[EmployeeController::class, 'importexcel'])->name('importexcel');
