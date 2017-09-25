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


Route::group(['prefix' => 'dosen', 'namespace' => 'Dosen', 'middleware' => ['auth']], function(){
		Route::get('/', "DashboardController@index");
		Route::get('absen', "AbsenController@index");
		Route::get('absen/{id_pertemuan}', 'AbsenController@absen');
		Route::post('absen/{id_pertemuan}', 'AbsenController@materi');
		Route::get('mahasiswa', 'MahasiswaController@index');
		Route::get('mahasiswa/card-register/{id_kelas?}', 'MahasiswaController@cardRegister');
		Route::resource("matakuliah", 'MataKuliahController');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function(){
	Route::get('/', "DashboardController@index");
	Route::resource('/dosen_pengampu', 'DosenPengampuController');
	Route::group(['prefix' => 'master', 'namespace' => "Master"], function(){
		Route::resource("mahasiswa", "MahasiswaController");
		Route::resource("dosen", "DosenController");
		Route::resource("matakuliah", "MataKuliahController");
		Route::resource("kelas", "KelasController");
		Route::resource("tahun_ajar", "TahunAjarController");
	});
});


Route::get('/dummy', 'Admin\DummyMaster@createUser');

Route::get('master/mahasiswa/card-register/{kelas?}'	, 'Admin\Master\MahasiswaController@getCardRegister');
Route::get('master/mahasiswa/reset-card-register'		, 'Admin\Master\MahasiswaController@getResetCard');
Route::get('master/mahasiswa/get-card/{id}'				, 'Admin\Master\MahasiswaController@getCard');
Route::get('master/mahasiswa/set-card/{nim}/{id_card}'	, 'Admin\Master\MahasiswaController@setCard');
Route::get('master/mahasiswa/update-card/{nim}/{id_card}'	, 'Admin\Master\MahasiswaController@updateCard');
Route::get('master/mahasiswa/get-by-card/{id_card}'		, 'Admin\Master\MahasiswaController@getByCard');
Route::resource('master/mahasiswa', 'Admin\Master\MahasiswaController');
