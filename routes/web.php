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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('keluar', function () {
    \Auth::logout();
    return redirect('/');
});

Route::get('/home', 'HomeController@index')->name('home');


Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

//obat
Route::get('admin/obats', 'ObatController@index')->name('admin.obat')->middleware('is_admin');
Route::post('admin/obats-add', 'ObatController@store')->name('store.obat')->middleware('is_admin');
Route::get('admin/obats/inactive/{obat_id}', 'ObatController@Inactive')->middleware('is_admin');
Route::get('admin/obats/active/{obat_id}', 'ObatController@Active')->middleware('is_admin');
Route::get('admin/obats/edit/{obat_id}', 'ObatController@Edit')->middleware('is_admin');
Route::post('admin/obats-update', 'ObatController@UpdateObat')->name('update.obat')->middleware('is_admin');
Route::get('admin/obats/delete/{obat_id}', 'ObatController@Delete')->middleware('is_admin');

//signa
Route::get('admin/signas', 'SignaController@index')->name('admin.signa')->middleware('is_admin');
Route::post('admin/signas-add', 'SignaController@store')->name('store.signa')->middleware('is_admin');
Route::get('admin/signas/edit/{signa_id}', 'SignaController@Edit')->middleware('is_admin');
Route::post('admin/signas-update', 'SignaController@UpdateSigna')->name('update.signa')->middleware('is_admin');
Route::get('admin/signas/delete/{signa_id}', 'SignaController@Delete')->middleware('is_admin');

//non racikan
Route::get('nonracikans', 'NonRacikanController@index')->name('nonracikan');
Route::post('nonracikans-add', 'NonRacikanController@store')->name('store.nonracikan');
Route::get('nonracikans/edit/{nonracikan_id}', 'NonRacikanController@Edit');
Route::post('nonracikans-update', 'NonRacikanController@UpdateNonRacikan')->name('update.nonracikan');
Route::get('nonracikans/delete/{nonracikan_id}', 'NonRacikanController@Delete');


//racikan
Route::get('racikans', 'RacikanController@index')->name('racikan');
Route::post('racikans-add', 'RacikanController@store')->name('store.racikan');
Route::get('racikans/edit/{racikan_id}', 'RacikanController@Edit');
Route::post('racikans-update', 'RacikanController@UpdateRacikan')->name('update.racikan');
Route::get('racikans/delete/{racikan_id}', 'RacikanController@Delete');