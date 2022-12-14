<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Middleware;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('role:admin')->group(function () {
    Route::resource('data_pengajuan', App\Http\Controllers\DatapengajuanController::class); 
    Route::resource('daftarakun', App\Http\Controllers\DaftarakunController::class); 
    Route::resource('data_pelamar', App\Http\Controllers\DatapelamarController::class); 
    Route::resource('lembur', App\Http\Controllers\LemburController::class);
    Route::resource('training', App\Http\Controllers\TrainingController::class);
    Route::resource('penugasan', App\Http\Controllers\PenugasanController::class);
    Route::resource('resign', App\Http\Controllers\ResignController::class);
    Route::resource('datapegawai', App\Http\Controllers\DatapegawaiController::class);
    Route::resource('mutasipegawai', App\Http\Controllers\MutasipegawaiController::class);
    Route::get('/admin_dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::post('/data_pengajuan/store', [App\Http\Controllers\DatapengajuanController::class, 'store'])->name('datapengajuan.store');;
    Route::post('/lembur/store', [App\Http\Controllers\LemburController::class, 'store'])->name('lembur.store');;
    Route::post('/training/store', [App\Http\Controllers\TrainingController::class, 'store'])->name('lembur.store');;
    Route::post('/daftarakun/store', [App\Http\Controllers\DaftarakunController::class, 'store'])->name('daftarakun.store');;
    Route::post('/data_pelamar/store', [App\Http\Controllers\DatapelamarController::class, 'store'])->name('datapelamar.store');;
    Route::post('/penugasan/store', [App\Http\Controllers\PenugasanController::class, 'store'])->name('penugasan.store');; 
    Route::post('/resign/store', [App\Http\Controllers\ResignController::class, 'store'])->name('resign.store');; 
    Route::post('/datapegawai/store', [App\Http\Controllers\DatapegawaiController::class, 'store'])->name('datapegawai.store');;
    Route::post('/mutasipegawai/store', [App\Http\Controllers\MutasipegawaiController::class, 'store'])->name('mutasipegawai.store');; 
});
Route::get('/pegawai_dashboard', [App\Http\Controllers\Pegawai\DashboardController::class, 'index'])->middleware('role:pegawai');;
Route::get('/pimpinan_dashboard', [App\Http\Controllers\Pimpinan\DashboardController::class, 'index'])->middleware('role:pimpinan');;
Route::get('/unitkerja_dashboard', [App\Http\Controllers\Auth\DashboardController::class, 'index'])->middleware('role:unitkerja');;

Route::get('/hai', function () {
    return view('halo');
});

Route::get('/halo', function () {
    return view('halo');
});