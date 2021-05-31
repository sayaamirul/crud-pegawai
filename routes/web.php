<?php

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
//     return view('layouts.admin');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('layouts.admin');
    });
    Route::resource('pegawai', \App\Http\Controllers\PegawaiController::class);
    Route::get('/export-excel-pegawai', \App\Http\Controllers\ExportExcelPegawaiController::class)->name('export.excel');
    Route::get('/export-pdf-pegawai', \App\Http\Controllers\ExportPdfPegawaiController::class)->name('export.pdf');
});
// Route::resource('pegawai', \App\Http\Controllers\PegawaiController::class);

require __DIR__ . '/auth.php';

// Route::get('/export-excel-pegawai', ExportExcelPegawaiController::class)->name('export.excel');
// Route::get('/export-pdf-pegawai', ExportPdfPegawaiController::class)->name('export.pdf');
