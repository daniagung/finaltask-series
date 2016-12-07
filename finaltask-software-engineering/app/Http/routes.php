<?php
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('landing-page');
});

// Auth Routes
Route::get('/login', 'AuthController@getLogin');
Route::post('/login', 'AuthController@postLogin');
Route::get('/logout', 'AuthController@getLogout');

// Registration routes
Route::get('/register', 'AuthController@getRegister');
Route::post('/register', 'AuthController@postRegister');


// Mahasiswa Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/mahasiswa', 'MahasiswaController@home');
    Route::get('/mahasiswa/pembayaran', 'MahasiswaController@regist_bayar');
    Route::get('/mahasiswa/regist-matkul', 'MahasiswaController@regist_matkul');
    Route::get('/mahasiswa/jadwal', 'MahasiswaController@jadwal');
    Route::get('/mahasiswa/presensi', 'MahasiswaController@presensi');
    Route::get('/mahasiswa/nilai', 'MahasiswaController@nilai');
    Route::get('/mahasiswa/profile', 'MahasiswaController@profile');
    Route::post('/mahasiswa/profile', 'MahasiswaController@postProfile');

});

// Admin Routes
Route::group(['middleware' => 'auth-admin'], function () {
    Route::get('/admin', 'AdminAkademikController@home');
    Route::get('/admin/input-kelas', 'AdminAkademikController@input_kelas');
    Route::get('/admin/input-matkul', 'AdminAkademikController@input_matkul');
    Route::get('/admin/input-jadwal', 'AdminAkademikController@input_jadwal');
    Route::get('/admin/profile', 'AdminAkademikController@profile');
});

Route::group(['middleware' => 'auth-dosen'], function () {
    Route::get('/dosen', 'DosenController@home');
    Route::get('/dosen/input-nilai', 'DosenController@input_nilai');
    Route::get('/dosen/input-presensi', 'DosenController@input_presensi');
    Route::get('/dosen/jadwal', 'DosenController@jadwal');
    Route::get('/dosen/profile', 'DosenController@profile');
});
