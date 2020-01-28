<?php
 
$data_mhs_anggota = DB::table('PendaftaranPPL')->select('PendaftaranPPL.kode_daftar')->where('validasiKaprodi', 'Belum_disetujui')->get();
 
$PendaftaranPPL = $data_mhs_anggota->count();

//  return dd($PendaftaranPPL);
echo $PendaftaranPPL;
?>

