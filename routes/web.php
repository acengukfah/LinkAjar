<?php

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
    return view('welcome');
});
//barang
Route::get('/barang', 'BarangController@index');
Route::post('/barang', 'BarangController@store');
Route::get('/barang/delete/{id}', 'BarangController@destroy');
Route::get('/barang/edit/{id}', 'BarangController@edit');
Route::post('/barang/update/{id}', 'BarangController@update');
//kategori-barang
Route::get('/kategori-barang', 'KategoriBarangController@index');
Route::post('/kategori-barang', 'KategoriBarangController@store');
Route::get('/kategori-barang/delete/{id}', 'KategoriBarangController@destroy');
Route::get('/kategori-barang/edit/{id}', 'KategoriBarangController@edit');
Route::post('/kategori-barang/update/{id}', 'KategoriBarangController@update');
//jenis-persediaan
Route::get('/jenis-persediaan', 'JenisPersediaanController@index');
Route::post('/jenis-persediaan', 'JenisPersediaanController@store');
Route::get('/jenis-persediaan/delete/{id}', 'JenisPersediaanController@destroy');
Route::get('/jenis-persediaan/edit/{id}', 'JenisPersediaanController@edit');
Route::post('/jenis-persediaan/update/{id}', 'JenisPersediaanController@update');
//pembukuan
Route::get('/pembukuan', 'PembukuanController@index');
Route::post('/pembukuan', 'PembukuanController@store');
Route::get('/pembukuan/delete/{id}', 'PembukuanController@destroy');
Route::get('/pembukuan/edit/{id}', 'PembukuanController@edit');
Route::post('/pembukuan/update/{id}', 'PembukuanController@update');
//persediaan
Route::get('/persediaan', 'PersediaanController@index');
Route::post('/persediaan', 'PersediaanController@store');
Route::get('/persediaan/delete/{id}', 'PersediaanController@destroy');
Route::get('/persediaan/edit/{id}', 'PersediaanController@edit');
Route::post('/persediaan/update/{id}', 'PersediaanController@update');
//export testing
Route::get('/saldo_awal', 'ExportController@saldo_awal');
Route::get('/pembelian', 'ExportController@pembelian');
Route::get('/transfer_masuk', 'ExportController@transfer_masuk');
Route::get('/transfer_keluar', 'ExportController@transfer_keluar');
Route::get('/tampil', 'ExportController@tampil');

Route::get('/input-data', 'InputController@index');