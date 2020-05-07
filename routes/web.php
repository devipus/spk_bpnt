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
	    return view('auth/login');
	});
	
	/**
	 * This from original Router Laravel
	 */
	// Auth::routes();


	/**
	 * Login Router
	 */
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('/login', 'Auth\LoginController@login')->name('login.submit');

	/**
	 * Logout Route
	 */
	Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

	/**
	 * Registration Routes
	 */
	$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	$this->post('register', 'Auth\RegisterController@register');

	/**
	 * Password Reset Routes
	 */
	$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
	$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
	$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
	$this->post('password/reset', 'Auth\ResetPasswordController@reset');

	/**
	 * Router For HomeController
	 */
	Route::get('/home', 'HomeController@index')->name('home');


	Route::get('api/kriteria', 'KriteriaController@apiKriteria')->name('api.kriteria');
	Route::resource('kriteria', 'KriteriaController');

	Route::get('api/alternatif', 'AlternatifController@apiAlternatif')->name('api.alternatif');
	Route::resource('alternatif', 'AlternatifController');

	Route::get('api/normalisasi', 'NormalisasiController@apiNormalisasi')->name('api.normalisasi');
	Route::resource('normalisasi', 'NormalisasiController');

	Route::get('api/dataumum', 'DataumumController@apiDataumum')->name('api.dataumum');
	Route::resource('dataumum', 'DataumumController');

	Route::get('api/provinsi', 'ProvinsiController@apiProvinsi')->name('api.provinsi');
	Route::resource('provinsi', 'ProvinsiController');
	
	Route::get('api/kabkota', 'KabkotaController@apiKabkota')->name('api.kabkota');
	Route::resource('kabkota', 'KabkotaController');

	Route::get('api/kec', 'KecController@apiKec')->name('api.kec');
	Route::resource('kec', 'KecController');

	Route::get('api/kel', 'KelController@apiKel')->name('api.kel');
	Route::resource('kel', 'KelController');

	Route::get('api/pembobotan', 'PembobotanController@apiPembobotan')->name('api.pembobotan');
	Route::resource('pembobotan', 'PembobotanController');

	Route::get('api/periode', 'PeriodeController@apiPeriode')->name('api.periode');
	Route::resource('periode', 'PeriodeController');
	Route::get('api/pembobotanawal', 'PembobotanawalController@apiPembobotanawal')->name('api.pembobotanawal');
	Route::resource('pembobotanawal', 'PembobotanawalController');

	Route::get('geo/rw', 'DataumumController@geoRw')->name('geo.rw');	
	Route::get('geo/rt', 'DataumumController@geoRt')->name('geo.rt');	
	Route::get('geo/region', 'GeoController@region')->name('geo.region');
	Route::get('geo/cities', 'GeoController@cities')->name('geo.cities');
	Route::get('geo/districts', 'GeoController@districts')->name('geo.districts');
	Route::get('geo/villages', 'GeoController@villages')->name('geo.villages');
	
	Route::get('perangkingan/rank', 'PerangkinganController@rank')->name('perangkingan.rank');	
	Route::resource('perangkingan', 'PerangkinganController');

	Route::get('api/warga', 'WargaController@apiWarga')->name('api.warga');	
	Route::resource('warga', 'WargaController');
	Route::get('wargaexport', 'WargaController@dataExport')->name('warga.export');

	Route::get('api/pembobotan', 'PembobotanController@apiPembobotan')->name('api.pembobotan');	
	Route::resource('pembobotan', 'PembobotanController');

	Route::get('api/pembobotanawal', 'PembobotanawalController@apiPembobotanawal')->name('api.pembobotanawal');	
	Route::resource('pembobotanawal', 'PembobotanawalController');

	Route::get('api/kriteria', 'KriteriaController@apiKriteria')->name('api.kriteria');	
	Route::resource('kriteria', 'KriteriaController');

	Route::get('api/hasil', 'HasilController@apiHasil')->name('api.hasil');	
	Route::get('hasil/laporan', 'HasilController@laporan')->name('laporan');
	Route::resource('hasil', 'HasilController');
	Route::get('hasilexport', 'HasilController@dataExport')->name('hasil.export');

	Route::get('uploadfile', 'UploadController@index');
	Route::post('uploadfile', 'UploadController@insert');
	
	Route::resource('beranda', 'berandaController');

	Route::get('/file','FileController@index')->name('viewfile');
	Route::get('/file/unggah','FileController@create')->name('formfile');
	Route::post('/file/unggah','FileController@store')->name('unggahfile');	
	Route::delete('/file/{id}','FileController@destroy')->name('deletefile');
	Route::get('/file/download/{id}','FileController@show')->name('downloadfile');





	
	
	