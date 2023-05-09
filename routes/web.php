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

Route::get('/data_kuat_arus', [App\Http\Controllers\KuatArusMotorDcController::class, 'index'])->name('data_kuat_arus');

Route::get('/data_tegangan', [App\Http\Controllers\TeganganMotorDcController::class, 'index'])->name('data_tegangan');

Route::get('/data_viskositas', [App\Http\Controllers\ViskositasController::class, 'index'])->name('data_viskositas');



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
