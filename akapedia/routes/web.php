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


Route::get('/', 'SiteController@index');
Route::post('/index/login', 'SiteController@login')->name('site_login');
Route::get('/index/logout', 'SiteController@logout')->name('site.logout');
Route::get('/pengumuman_all', 'SiteController@pengumuman')->name('pengumuman.all');
Route::get('/berita_all', 'SiteController@beritas')->name('berita.all');
Route::get('/about', 'SiteController@about')->name('site.about');
Route::get('/akademik', 'SiteController@akademik')->name('site.akademik');
Route::get('/akademik/{id}/kelas', 'SiteController@kelas')->name('site.kelas');

Route::get('/login', 'DashboardController@login')->name('login');
Route::post('/postlogin', 'DashboardController@postlogin')->name('login_account');
Route::get('/logout', 'DashboardController@logout')->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:kepala sekolah,guru,tu']], function() {
    Route::get('/data_siswa', 'SiswaController@index')->name('siswa');
    Route::post('/data_siswa/create', 'SiswaController@create')->name('create');
    Route::get('/data_siswa/{id}/edit', 'SiswaController@edit')->name('edit');
    Route::post('/data_siswa/{id}/update', 'SiswaController@update')->name('update');
    Route::get('/data_siswa/{id}/delete', 'SiswaController@delete');
    Route::get('/data_siswa/{id}/profile', 'SiswaController@profile')->name('profile.siswa');
    Route::post('/data_siswa/{id}/nilai', 'SiswaController@nilai');
    Route::get('/data_siswa/{id}/{idmapel}/delete', 'SiswaController@deletenilai');
    Route::get('/data_siswa/excel', 'SiswaController@exportExcel')->name('export_excel');
    Route::get('/data_siswa/pdf', 'SiswaController@exportPDF')->name('export_pdf');
    Route::get('/data_siswa/{id}/print_nilai', 'SiswaController@print')->name('siswa.nilai');

    Route::get('/data_pegawai', 'PegawaiController@index')->name('pegawai');
    Route::post('/data_pegawai/create', 'PegawaiController@create')->name('create_pegawai');
    Route::get('/data_pegawai/{id}/edit', 'PegawaiController@edit');
    Route::post('/data_pegawai/{id}/update', 'PegawaiController@update');
    Route::get('/data_pegawai/{id}/delete', 'PegawaiController@delete');
    Route::get('/data_pegawai/{id}/profile', 'PegawaiController@profile')->name('profile');
    Route::get('/edit_profile/{id}/edit', 'PegawaiController@editprofile')->name('profile.edit');
    Route::post('/update_profile/{id}/update', 'PegawaiController@updateprofile')->name('profile.update');

    Route::get('/data_mapel', 'MapelController@index')->name('mapel');
    Route::post('/data_mapel/create', 'MapelController@create')->name('create_mapel');
    Route::get('/data_mapel/{id}/edit', 'MapelController@edit');
    Route::post('/data_mapel/{id}/update', 'MapelController@update');
    Route::get('/data_mapel/{id}/delete', 'MapelController@delete');

    Route::get('/data_pengumuman', 'ArtikelController@index')->name('pengumuman');
    Route::post('/data_pengumuman/create', 'ArtikelController@create')->name('laporan');
    Route::get('/data_pengumuman/{id}/edit', 'ArtikelController@edit')->name('artikel.edit');
    Route::post('/data_pengumuman/{id}/update', 'ArtikelController@update')->name('artikel.update');
    Route::get('/data_pengumuman/{id}/delete', 'ArtikelController@delete')->name('artikel.hapus');

    Route::get('/data_berita', 'BeritaController@index')->name('berita');
    Route::post('/data_berita/create', 'BeritaController@create')->name('berita.create');
    Route::get('/data_berita/{id}/edit', 'BeritaController@edit')->name('berita.edit');
    Route::post('/data_berita/{id}/update', 'BeritaController@update')->name('berita.update');
    Route::get('/data_berita/{id}/delete', 'BeritaController@delete')->name('berita.delete');

    Route::get('/data_promosi', 'PromosiController@index')->name('promosi');
    Route::post('/data_promosi/create', 'PromosiController@create')->name('promosi.create');
    Route::get('/data_promosi/{id}/edit', 'PromosiController@edit')->name('promosi.edit');
    Route::post('/data_promosi/{id}/update', 'PromosiController@update')->name('promosi.update');
    Route::get('/data_promosi/{id}/delete', 'PromosiController@delete')->name('promosi.delete');

    Route::get('/data_kelas', 'KelasController@index')->name('kelas');
    Route::post('/data_kelas/create', 'KelasController@create')->name('kelas.input');
    Route::get('/data_kelas/{id}/tambah_siswa', 'KelasController@siswa')->name('kelas.siswa');
    Route::post('/data_kelas/{id}/create_siswa', 'KelasController@tambahsiswa')->name('kelas.tambah_siswa');
    Route::get('/data_kelas/{id}/siswa', 'KelasController@murid')->name('kelas.murid');
    Route::get('/data_kelas/{id}/edit', 'KelasController@edit')->name('kelas.edit');
    Route::post('/data_kelas/{id}/update', 'KelasController@update')->name('kelas.update');
    Route::get('/data_kelas/{id}/delete', 'KelasController@delete')->name('kelas.delete');
    Route::get('/data_kelas/{id}/{idmapel}/delete', 'KelasController@deletesiswa');
    Route::get('/data_kelas/{id}/print_siswa', 'KelasController@print')->name('print.siswa');

    Route::get('/data_jadwal', 'JadwalController@index')->name('jadwal');
    Route::get('/data_jadwal/{id}/input_jadwal', 'JadwalController@inputjadwal')->name('jadwal.create_jadwal');
    Route::post('/data_jadwal/{id}/create', 'JadwalController@create')->name('jadwal.create');
    Route::get('/data_jadwal/{id}/jadwal', 'JadwalController@jadwal')->name('jadwal.kelas');
    Route::get('/data_jadwal/{id}/{idsiswa}/delete', 'JadwalController@delete')->name('jadwal.delete');
    Route::get('/data_jadwal/{id}/print_jadwal', 'JadwalController@print')->name('jadwal.print');

    Route::get('/data_about', 'DashboardController@about')->name('about');
    Route::post('/data_about', 'DashboardController@create')->name('about.input');
    Route::get('/data_about/{id}/edit', 'DashboardController@edit')->name('about.edit');
    Route::post('/data_about/{id}/upadate', 'DashboardController@update')->name('about.update');
    Route::get('/data_about/{id}/delete', 'DashboardController@delete')->name('about.delete');
});

Route::group(['middleware' => ['auth', 'checkRole:kepala sekolah,guru,tu']], function() {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});


Route::group(['middleware' => ['auth', 'checkRole:siswa']], function() {
    Route::get('/index/dashboard/', 'SiteController@dashboard')->name('site.dashboard');
    Route::get('/index/edit_siswa/{id}/edit', 'SiswaController@editsiswa')->name('edit.siswa');
    Route::post('/index/update_siswa/{id}/upadate', 'SiswaController@updatesiswa')->name('update.siswa');
    Route::get('/index/siswa/{id}/nilai', 'SiswaController@nilaisiswa')->name('nilai.siswa');
    Route::get('/index/siswa/{id}/print_nilai', 'SiswaController@print')->name('siswa.nilai');
});


Route::get('/pengumuman/{slug}', [
    'uses' => 'SiteController@artikel',
    'as' => 'site.artikel'
]);

Route::get('/berita/{slug}', 'SiteController@berita')->name('berita.link');

Route::get('/promosi/{slug}', 'SiteController@promosi')->name('promosi.link');
