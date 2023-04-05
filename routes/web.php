<?php

use App\Http\Controllers\UserController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/',[UserController::class,'login']);
Route::post('/login',[UserController::class,'loginProses']);
Route::get('/register',[UserController::class,'register']);



Route::get('/pemasukan', 'App\Http\Controllers\PemasukanController@index');
Route::get('/pemasukan/create', 'App\Http\Controllers\PemasukanController@create');
Route::post('/pemasukan', 'App\Http\Controllers\PemasukanController@store');
Route::get('/pemasukan/{pemasukan}', 'App\Http\Controllers\PemasukanController@show');
Route::get('/pemasukan/{pemasukan}/edit', 'App\Http\Controllers\PemasukanController@edit');
Route::put('/pemasukan/{pemasukan}', 'App\Http\Controllers\PemasukanController@update');
Route::get('/pemasukan/{pemasukan}', 'App\Http\Controllers\PemasukanController@destroy');

Route::get('/pengeluaran', 'App\Http\Controllers\PengeluaranController@index');
Route::get('/pengeluaran/create', 'App\Http\Controllers\PengeluaranController@create');
Route::post('/pengeluaran', 'App\Http\Controllers\PengeluaranController@store');
Route::get('/pengeluaran/{pengeluaran}', 'App\Http\Controllers\PengeluaranController@show');
Route::get('/pengeluaran/{pengeluaran}/edit', 'App\Http\Controllers\PengeluaranController@edit');
Route::put('/pengeluaran/{pengeluaran}', 'App\Http\Controllers\PengeluaranController@update');
Route::get('/pengeluaran/{pengeluaran}', 'App\Http\Controllers\PengeluaranController@destroy');
