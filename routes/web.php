<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


/// Menampilkan Data

Route::get('/', function () {
    return view('adminlte.index');
});

Route::get('/home', function () {
    return view('adminlte.index');
});



/// Kecepatan
Route::get('/kecepatan_motor', function () {
    return view('adminlte.index_kecepatan');
});



Route::get('/data_kecepatan_motor', [App\Http\Controllers\KecepatanMotorDcController::class, 'index'])->name('data_kecepatan_motor');

Route::get('/data_kecepatan_motor_sesudah', [App\Http\Controllers\KecepatanMotorDcSesudahController::class, 'index'])->name('data_kecepatan_motor_sesudah');

Route::get('/data_kuat_arus', [App\Http\Controllers\KuatArusMotorDcController::class, 'index'])->name('data_kuat_arus');
Route::get('/data_tegangan', [App\Http\Controllers\TeganganMotorDcController::class, 'index'])->name('data_tegangan');
Route::get('/data_viskositas', [App\Http\Controllers\ViskositasController::class, 'index'])->name('data_viskositas');



/// Store Data
Route::post('/store_data_kecepatan_motor', [App\Http\Controllers\KecepatanMotorDcController::class, 'store'])->name('store_data_kecepatan_motor');
/// Store Data
Route::post('/store_data_kecepatan_motor_sesudah', [App\Http\Controllers\KecepatanMotorDcSesudahController::class, 'store'])->name('store_data_kecepatan_motor_sesudah');

Route::post('/store_data_kuat_arus', [App\Http\Controllers\KuatArusMotorDcController::class, 'store'])->name('store_data_kuat_arus');
Route::post('/store_data_tegangan', [App\Http\Controllers\TeganganMotorDcController::class, 'store'])->name('store_data_tegangan');

Route::post('/store_data_viskositas', [App\Http\Controllers\ViskositasController::class, 'store'])->name('store_data_viskositas');






/// Kuat Arus
Route::get('/kuat_arus', function () {
    return view('adminlte.index_kuat_arus');
});

Route::get('/tegangan', function () {
    return view('adminlte.index_tegangan');
});




// Route::get('/kecepatan_motor', function () {
//     return view('adminlte.layouts');
// });



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
