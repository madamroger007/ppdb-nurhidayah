<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportLaporanController;
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
    return view('landing-page');
});

Route::get('/pendaftaran', function () {
    return view('pages.pendaftaran');
});

Route::post('/submit-pendaftaran', [App\Http\Controllers\PendaftaranController::class, 'store'])
    ->name('pendaftaran.store');

Route::get('/admin/logout', function () {
    auth()->logout();
    return redirect('/admin/login');
})->name('filament.logout');


Route::get('/export-laporan/{year}', [ExportLaporanController::class, 'export'])->name('laporan.export');
