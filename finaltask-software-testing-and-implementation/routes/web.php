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
Route::group(['middleware' => 'auth.mahasiswa'], function () {
    Route::get('/mahasiswa', 'MahasiswaController@home');
    Route::get('/mahasiswa/pembayaran', 'MahasiswaController@regist_bayar');
    Route::post('/mahasiswa/pembayaran', 'MahasiswaController@postBayarToken');

    Route::get('/mahasiswa/regist-matkul', 'MahasiswaController@regist_matkul');
    Route::get('/mahasiswa/jadwal', 'MahasiswaController@jadwal');
    Route::get('/mahasiswa/presensi', 'MahasiswaController@presensi');
    Route::get('/mahasiswa/nilai', 'MahasiswaController@nilai');
    Route::get('/mahasiswa/profile', 'MahasiswaController@profile');
    Route::post('/mahasiswa/profile', 'MahasiswaController@postProfile');

});

// Admin Routes
Route::group(['middleware' => 'auth.admin'], function () {
    Route::get('/admin', 'AdminAkademikController@home');
    Route::get('/admin/input-kelas', 'KelasController@input_kelas');
    Route::post('/admin/input-kelas', 'KelasController@submitKelas');
    Route::get('/admin/input-matkul', 'MataKuliahController@getMatkul');
    Route::post('/admin/input-matkul', 'MataKuliahController@submitMatkul');
    Route::get('/admin/edit-matkul/{id}', 'MataKuliahController@editMatkul');
    Route::post('/admin/edit-matkul/{id}', 'MataKuliahController@submitEditMatkul');
    Route::get('/admin/input-jadwal', 'JadwalController@input_jadwal');
    Route::post('/admin/input-jadwal', 'JadwalController@submitJadwal');
    Route::get('admin/input-mahasiswa', 'AdminAkademikController@input_mahasiswa');
    Route::post('admin/input-mahasiswa', 'AdminAkademikController@postMahasiswa');
    Route::get('admin/delete-mhs/{id}', 'AdminAkademikController@deleteMahasiswa');
    Route::get('admin/edit-mhs/{id}', 'AdminAkademikController@editMahasiswa');
    Route::post('admin/edit-mhs/{id}', 'AdminAkademikController@submitEditMahasiswa');
    Route::get('admin/input-dosen', 'AdminAkademikController@input_dosen');
    Route::post('admin/input-dosen', 'AdminAkademikController@postDosen');
    Route::get('admin/delete-dsn/{id}', 'AdminAkademikController@deleteDosen');
    Route::get('admin/edit-dsn/{id}', 'AdminAkademikController@editDosen');
    Route::post('admin/edit-dsn/{id}', 'AdminAkademikController@submitEditDosen');
    Route::get('/admin/profile', 'AdminAkademikController@profile');
    Route::get('admin/delete-kelas/{id}', 'KelasController@deleteKelas');
    Route::get('admin/delete-jadwal/{id}', 'JadwalController@deleteJadwal');
    Route::get('admin/delete-matkul/{id}', 'MataKuliahController@deleteMatkul');
});

// Dosen Router
Route::group(['middleware' => 'auth.dosen'], function () {
    Route::get('/dosen', 'DosenController@home');
    Route::get('/dosen/input-nilai', 'DosenController@input_nilai');
    Route::post('/dosen/input-nilai', 'DosenController@postNilai');
    Route::get('/dosen/input-nilai/delete/{id}', 'DosenController@deleteNilai');

    Route::get('/dosen/input-presensi', 'PresensiController@input_presensi');
    Route::post('/dosen/input-presensi', 'PresensiController@postSelectMatkulPresensi');

    Route::get('/dosen/input-presensi/{id_matkul}', 'PresensiController@inputPresensiMahasiswa');
    Route::post('/dosen/input-presensi/{id_matkul}', 'PresensiController@submitPresensiMahasiswa');


    Route::get('/dosen/jadwal', 'DosenController@jadwal');
    Route::get('/dosen/profile', 'DosenController@profile');
    Route::post('/dosen/profile', 'DosenController@postProfile');
});
