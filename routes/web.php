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

Route::get('/login','LoginController@login')->name('login');
Route::post('/postlogin','LoginController@postlogin');
Route::get('/logout','LoginController@logout');

Route::get('/respon','ResponController@index')->name('respon');
route::get('/respon/export_excel','ResponController@export_excel');
Route::post('/postrespon','ResponController@store');

Route::get('/register','RegisterController@register')->name('register');
Route::post('/postregister','RegisterController@postregister');

Route::get('/','LaporanController@index');
route::get('/laporan/export_excel','LaporanController@export_excel');
Route::post('/postlaporan','LaporanController@store');



Route::middleware(['auth'])->group(function () {
    Route::get('admin/dashboard','DashboardController@index');
    Route::resource('admin/history-laporan','HistoryLaporanController');
    Route::resource('admin/history-respon','HistoryResponController');
    Route::resource('admin/unit-lapor','UnitLaporController');
    Route::resource('admin/bagian','BagianController');
    Route::resource('admin/lokasi','LokasiController');
    Route::resource('admin/petugas','PetugasController');
});
