<?php

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth','role');
Route::get('/', 'HomeController@index')->middleware('auth','role');
 
//User
Route::resource('user', 'UserController');
Route::get('/tambahkajur', 'UserController@createkajur')->name('tambahkajur');
Route::post('/simpankajur', 'UserController@storekajur')->name('simpankajur');
 
//SMK
Route::resource('SMK', 'SMKController');
Route::get('/DashboardSMK', 'SMKController@DashboardSMK')->middleware('auth');
Route::get('/listvalidasismk', 'SMKController@listbelumdivalidasi')->name('listvalidasismk');
Route::get('/listsudahdivalidasismk', 'SMKController@listsudahdivalidasismk')->name('listsudahdivalidasismk');
Route::get('/listPosting', 'SMKController@listPosting')->name('listPosting');
Route::get('/smkmendaftar', 'SMKController@smkcreate')->name('smkmendaftar');
Route::post('/simpansmk', 'SMKController@smkstore');
Route::put('smk/{id}/updateprofile', 'SMKController@updateprofile')->name('SMK.updateprofile');
Route::get('/editSMK', 'SMKController@editprofile')->name('editSMK');
Route::post('/updateSMK', 'SMKController@update');
Route::get('/smkshow', 'SMKController@smkshow')->name('smkshow');
Route::put('SMK/{id}/validasiSMK', 'SMKController@validasiSMK')->name('SMK.validasi');
Route::get('/{id}/detailpendaftar', 'SMKController@detailpendaftar')->name('detailpendaftar');
Route::get('lakukanposting', 'SMKController@lakukanposting')->name('lakukanposting');
Route::put('smk/{id}/Posting', 'SMKController@Posting')->name('SMK.posting');

//Activication
Route::get('/user/Activation/{token}', 'UserController@Activation');
//Route::get('/user/Activation/{token}', 'MahasiswaController@Activation');
 
//mahasiswa
Route::resource('Mahasiswa', 'MahasiswaController');
Route::get('/DashboardMahasiswa', 'MahasiswaController@Dashboard')->middleware('auth');
Route::get('/listpendaftar', 'MahasiswaController@PendaftaranPPL')->name('listpendaftar');
Route::get('/editMahasiswa', 'MahasiswaController@edit')->name('editMahasiswa');
Route::get('/{id}/mhspendaftardetail', 'MahasiswaController@mhspendaftardetail')->name('mhspendaftardetail');
Route::put('mahasiswa/{id}/updateprofile', 'MahasiswaController@update')->name('mahasiswa.updateprofile');
Route::get('/daftarDosbing', 'MahasiswaController@daftarDosbing')->name('daftarDosbing');
Route::get('/daftarsmk', 'MahasiswaController@listPostingsmk')->name('daftarsmk');

// pendaftaran PPL
Route::resource('PendaftaranPPL', 'PendaftaranPPLController');
Route::get('/PendaftaranPPL', 'PendaftaranPPLController@create')->name('PendaftaranPPL');
Route::post('/SimpanPendaftaranPPL', 'PendaftaranPPLController@store');
Route::get('/{id}/pendaftardetail', 'PendaftaranPPLController@pendaftardetail')->name('pendaftardetail');
Route::post('/validasismk', 'PendaftaranPPLController@validasismk');
Route::get('/listPendaftaranPPL', 'PendaftaranPPLController@listPendaftaranPPL')->name('listPendaftaranPPL');
 
//Dosbing
Route::resource('dosbing', 'DosbingController');
Route::get('/listdosbing', 'DosbingController@index')->name('listdosbing');
Route::get('/showdosbing', 'DosbingController@show1')->name('showdosbing');
Route::get('/tambahdosbing', 'DosbingController@create')->name('tambahdosbing');
Route::post('/simpandosbing', 'DosbingController@store')->name('editdosbing');
Route::post('/editdosbing', 'DosbingController@edit');
Route::put('dosbing/{id}/update', 'DosbingController@update')->name('dosbingupdate');

//Kajur
Route::get('/DashboardKajur', 'KajurController@DashboardKajur')->middleware('auth');
Route::resource('kajur', 'KajurController');
Route::get('/listdosbing', 'KajurController@listdosbing')->name('listdosbing');
Route::get('/{id}/mhsdetail', 'KajurController@pendaftardetail')->name('mhsdetail');
Route::get('/editkajur', 'KajurController@editprofile')->name('editkajur');
Route::put('kajur/{id}/updateprofile', 'KajurController@kajurupdateprofile')->name('kajur.updateprofile');
Route::put('kajur/{id}/validasikajur', 'KajurController@validasiKajur')->name('kajur.validasi');
Route::get('/listbelumdivalidasikajur', 'KajurController@listbelumdivalidasikajur')->name('listbelumdivalidasikajur');
Route::get('/listsudahdivalidasikajur', 'KajurController@listsudahdivalidasi')->name('listsudahdivalidasikajur');
 
//Kaprodi
Route::get('/DashboardKaprodi', 'KaprodiController@DashboardKaprodi')->middleware('auth');
Route::resource('kaprodi', 'KaprodiController');
Route::get('/listPostingsmk', 'KaprodiController@listPostingsmk')->name('listPostingsmk');
Route::get('/{id}/pendaftardetail', 'KaprodiController@pendaftardetail')->name('pendaftardetail');
Route::get('/listvalidasiKaprodi', 'KaprodiController@listbelumdivalidasi')->name('listvalidasiKaprodi');
Route::get('/sudahdivalidasiKaprodi', 'KaprodiController@listsudahdivalidasi')->name('sudahdivalidasiKaprodi');
Route::get('/editKaprodi', 'KaprodiController@halamaneditprofile')->name('editKaprodi');
Route::put('kaprodi/{id}/updateprofile', 'KaprodiController@kaprodiupdateprofile')->name('kaprodi.updateprofile');
Route::put('/kaprodi/{id}/validasikaprodi','KaprodiController@melakukanvalidasi')->name('kaprodi.validasi');
Route::get('/listmhspti', 'KaprodiController@listmhspti')->name('listmhspti');
Route::get('/TambahMahasiswa', 'MahasiswaController@TambahMahasiswa')->name('TambahMahasiswa');
Route::post('/simpanMhs', 'MahasiswaController@store')->name('simpanMhs');
Route::get('/hapusmhs/{user_id}','KaprodiController@hapus');
 
 
//Cetak PDF
Route::get('laporan-pdf','MahasiswaController@generatePDF')->name('laporan-pdf');

//Download surat F2A
Route::get('download', function(){
    $file = public_path()."/DraftPanduanPPL.pdf";

    $headers = array(
        'Content-Type: application/pdf',
    );
    return Response::download($file, "DraftPanduanPPL.pdf", $headers);
});



 
