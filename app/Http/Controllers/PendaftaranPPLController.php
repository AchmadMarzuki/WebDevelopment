<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\SMK;
use App\Mahasiswa;
use App\PendaftaranPPL;
use App\Dosbing;
use App\Kajur;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\NotifKaprodi\NotifKaprodi;
use App\Notifications\NotifSMK\NotifSMK;
use App\Notifications\Notifations\TaskCompleted;
use App\Notifications\NotifKetuaTim\NotifKetuaTim;
use App\Notifications\NotifIndividu\NotifIndividu;
use App\Notifications\NotifAnggota1\NotifAnggota1;
use App\Notifications\NotifAnggota2\NotifAnggota2;
use App\Notifications\NotifAnggota3\NotifAnggota3;
use Illuminate\Support\Facades\Mail;

class PendaftaranPPLController extends Controller {

  public function create() {
    // $namaketua = Auth::user()->nama;  
//    return dd($namaketua);
      $getRow = PendaftaranPPL::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        $lastId = $getRow->first();
        $kode = "PPL00001";
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $kode = "PPL0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $kode = "PPL000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $kode = "PPL00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $kode = "PPL0".''.($lastId->id + 1);
            } else {
                    $kode = "PPL".''.($lastId->id + 1);
            }
        }

        
        //Mengambil Data Mahasiswa yang sedang melakukan login dengan id yang sama dengan id user
        //$mahasiswa = DB::table('mahasiswa')->where('user_id', Auth::user()->id)->get();
        

        $data_mhs = Mahasiswa::select('id','nama', 'nim', 'sks','user_id','email')->where('user_id', Auth::user()->id)->first();

        //Mengambil Data Mahasiswa yang tidak sama dengan Login user untuk menampilkan ke List Anggota
        $data_mhs_anggota = Mahasiswa::select('id','nama', 'nim', 'sks','user_id','email')->where('user_id' ,'!=', Auth::user()->id)->get();

        //Menngirim Data Informasi PPL yang sudah diposting Oleh SMK
        $SMK = SMK::get()->where('kuota', '!=', null);
       
        //Mengambil semua Data Dosen Pembimbing PPL
        $dosbing = Dosbing::get();

        // Mengecek apakah Mahasiswa sudah Terdaftar sebelumnya
        $count = PendaftaranPPL::select('mahasiswa_id')->where('mahasiswa_id' ,'=', Auth::user()->id)->count();
              if($count>0){
                      alert()->warning('Anda telah terdaftar');
                  return redirect()->to('DashboardMahasiswa');
              }
              // return dd($SMK);
        return view('pendaftaranppl.create', compact('SMK', 'kode', 'dosbing', 'data_mhs','data_mhs_anggota'));
    }

    public function store(Request $request) {

        $this->validate($request,[
          'informasi_id' => 'required|min:2|max:35',
          'dosen_id' => 'required|min:2|max:35',
        ],[
          'informasi_id.required' => ' Silahkan pilih SMK.',
          'dosen_id.required' => ' Silahkan pilih Dosen Pembimbing PPL.',
        ]);

      for ($i=0; $i < count($request->mahasiswa_id); $i++) { 

          if ($request->nim[$i] != null) {
                $pendaftaranppl = array(
                                'kode_daftar' => $request->kode_daftar,
                                'smk_id' => $request->informasi_id,
                                'dosbing_id' => $request->dosen_id,
                                'validasiSMK' => 'Belum_disetujui',
                                'validasiKaprodi' => 'Belum_disetujui',
                                'validasiKajur' => 'Belum_disetujui',
                                'mahasiswa_id' => $request->mahasiswa_id[$i],
                                 'created_at' => Carbon::now(),
                                'updated_at' => Carbon::now(),
                            );
                            if ($request->sks[$i] < 120) {
                                alert()->success('SKS Anggota dengan nama ' .$request->nama[$i]. ' tidak memenuhi syarat');
                                return redirect()->to('listpendaftar');               
                            }    
                             DB::table('PendaftaranPPL')->insert($pendaftaranppl);
                        }   
                    }

                if ($request->demo == 'One') {
                  $namaindividu = ($request->nama[0]);  
                  $emailindividu = ($request->email[0]);
                  Mail::to($emailindividu)->send(new NotifIndividu($namaindividu));
                  }else{
                
              $NamaKetuaTim = Auth::user()->nama; 
              $emailketua = ($request->email[0]);  
              $ismail1 = ($request->email[1]);
              $namaAnggota1 = ($request->nama[1]); 
              $ismail2 = ($request->email[2]);
              $namaAnggota2 = ($request->nama[2]); 
              $ismail3 = ($request->email[3]);
              $namaAnggota3 = ($request->nama[3]); 
                      //foreach (Auth::user()->email as $notifmails){
    if ($emailketua != null) {

      Mail::to($emailketua)->send(new NotifKetuaTim($NamaKetuaTim));
    }
    if ($ismail1 != null) {
      Mail::to($ismail1)->send(new notifAnggota1($NamaKetuaTim, $namaAnggota1));
    }
    if ($ismail2 != null) {
      Mail::to($ismail2)->send(new notifAnggota2($NamaKetuaTim, $namaAnggota2));
    }
    if ($ismail3 != null) {
      Mail::to($ismail3)->send(new notifAnggota3($NamaKetuaTim, $namaAnggota3)); 
  }
}
    $data_mhs_anggota = PendaftaranPPL::select('kode_daftar')->where('mahasiswa_id' ,'=', Auth::user()->id)->first();
    $PendaftaranPPL = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
        ->join('dosbing','dosbing.id', '=', 'PendaftaranPPL.dosbing_id')
        ->join('mahasiswa','mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('PendaftaranPPL.kode_daftar', 'mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah','SMK.email')
        ->where('kode_daftar', $data_mhs_anggota->kode_daftar)->get();

        $status = DB::table('PendaftaranPPL')->select(DB::raw('COUNT(kode_daftar) AS jumlah'), 'kode_daftar')->groupBy('kode_daftar')->get();        
        $i=0;
        foreach ($status as $data) {
           $kode_daftar[$i] = $data->kode_daftar;
           $jumlah[$i] = $data->jumlah;
           $i++;
        }
        $jumlahdata = count($status);

        $emailsmk = ($request->emailsmk);
        Mail::to($emailsmk)->send(new NotifSMK($PendaftaranPPL, $kode_daftar, $jumlah, $jumlahdata));

        $EmailKaprodi = 'kaprodipti@gmail.com';
        Mail::to($EmailKaprodi)->send(new NotifKaprodi($PendaftaranPPL, $kode_daftar, $jumlah, $jumlahdata));  
     
        alert()->success('Berhasil Mendaftar');
        return redirect()->to('listpendaftar');            
    }
    
    public function pendaftardetail($mahasiswa_id) {
        $data_mhs_anggota = PendaftaranPPL::select('kode_daftar')->where('mahasiswa_id' ,'=', $mahasiswa_id)->first();
        $PendaftaranPPL = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
         ->join('dosbing','dosbing.id', '=', 'PendaftaranPPL.dosbing_id')
         ->join('mahasiswa','mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('PendaftaranPPL.kode_daftar', 'mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'dosbing.nama_dosbing','SMK.waktu_mulai','PendaftaranPPL.id', 'SMK.waktu_berakhir', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
        ->where('kode_daftar', $data_mhs_anggota->kode_daftar)
        ->get();
        //return dd($PendaftaranPPL);
        return view('PendaftaranPPL.pendaftardetail', compact('PendaftaranPPL'));
    }
   
     public function listPendaftaranPPL() {
        // $pendaftaranppl = PendaftaranPPL::get();
        $PendaftaranPPL = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
         ->join('dosbing','dosbing.id', '=', 'PendaftaranPPL.dosbing_id')
        ->select('PendaftaranPPL.kode_daftar', 'PendaftaranPPL.id', 'mahasiswa.nama','mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'dosbing.nama_dosbing','SMK.waktu_mulai', 'SMK.waktu_berakhir', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
        ->get();
        
        return view('PendaftaranPPL.listPendaftaranPPL', compact('PendaftaranPPL'));

    }

    public function destroy($id) {
        PendaftaranPPL::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('pendaftaranppl.index');
    }

}
 

 