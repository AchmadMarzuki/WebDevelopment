<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Kajur;
use App\PendaftaranPPL;
use App\Teamppl;
use App\Mahasiswa;
use App\SMK;
use App\Notifications\NotifValidasiKajur\notifvalidasikajur;
use Illuminate\Support\Facades\Mail;
use App\Dosbing;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class KajurController extends Controller {
     
    public function __construct() {
        $this->middleware('auth');
    }
    public function DashboardKajur() {        
         return view('kajur.Dashboard');
    }
    public function listdosbing() {
        $listdosbing = Dosbing::get();
        return view('kajur.listdosbing', compact('listdosbing'));
    }
    public function listbelumdivalidasikajur() {
        $pendaftaranppl = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
        ->join('mahasiswa', 'mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('PendaftaranPPL.kode_daftar','PendaftaranPPL.mahasiswa_id', 'PendaftaranPPL.id', 'mahasiswa.nama','mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
        ->where('validasiKaprodi', 'Sudah_disetujui')->where('validasiKajur', 'Belum_disetujui')
        ->get();

          $status = DB::table('PendaftaranPPL')->select(DB::raw('COUNT(kode_daftar) AS jumlah'), 'kode_daftar')->groupBy('kode_daftar')->get();        
         $i=0;
         foreach ($status as $data) {
            $kode_daftar[$i] = $data->kode_daftar;
            $jumlah[$i] = $data->jumlah;
            $i++;
         }
         $jumlahdata = count($status);
        return view('kajur.belumdivalidasi', compact('pendaftaranppl', 'kode_daftar', 'jumlah','jumlahdata'));
    }

    public function listsudahdivalidasi() {         
        $pendaftaranppl = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
        ->join('mahasiswa', 'mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('PendaftaranPPL.kode_daftar','PendaftaranPPL.mahasiswa_id', 'PendaftaranPPL.id', 'mahasiswa.nama','mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
        ->where('validasiKajur', 'Sudah_disetujui')
        ->get();

         $status = DB::table('PendaftaranPPL')->select(DB::raw('COUNT(kode_daftar) AS jumlah'), 'kode_daftar')->groupBy('kode_daftar')->get();        
         $i=0;
         foreach ($status as $data) {
            $kode_daftar[$i] = $data->kode_daftar;
            $jumlah[$i] = $data->jumlah;
            $i++;
         }
         $jumlahdata = count($status);        
      return view('kajur.sudahdivalidasi', compact('pendaftaranppl', 'kode_daftar', 'jumlah','jumlahdata')); 
   }
       
    public function editprofile() {   
        $kajur = DB::table('users')
      ->where('users.id', Auth::user()->id)
        ->get();
        return view('kajur.edit', compact('kajur'));
}

public function kajurupdateprofile(Request $request, $id){
    $update = User::find($id);

    if($request->file('gambar')) {
        $file = $request->file('gambar');
        $dt = Carbon::now();
        $acak  = $file->getClientOriginalExtension();
        $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
        $request->file('gambar')->move("images/user", $fileName);
        $update->gambar = $fileName;
    }

    $update->update([
        'nama'=>$request->nama,
        'email'=>$request->email,
        'password' => bcrypt(($request->input('password')))]);

    alert()->success('Kajur.','Berhasil di Update!');
    return redirect()->to('DashboardKajur');
}
 
     public function GetNamaKajur() {
        $data_kajur = User::select('users.nama')->join('kajur', 'users.id','=','kajur.user_id')->first();
    }

    public function validasiKajur(Request $request, $id) {
             $pendaftaranppl = PendaftaranPPL::find($id);

        $emailMahasiswa = DB::table('PendaftaranPPL')
        ->join('mahasiswa', 'mahasiswa.user_id', '=', 'pendaftaranppl.mahasiswa_id')
        ->select('mahasiswa.email' , 'mahasiswa.nama')
         ->where('pendaftaranppl.id', $id)
         ->get();
         foreach ($emailMahasiswa as $notifmails){
          Mail::to($notifmails->email)->send(new notifvalidasikajur($notifmails->nama));
         }
 
        $pendaftaranppl->update([
                'validasiKajur' => 'Sudah_disetujui'
                ]);
 
        alert()->success('Berhasil.','Mahasiswa telah divalidasi!');
        return redirect()->to('listsudahdivalidasikajur');

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
         return view('kajur.pendaftardetail', compact('PendaftaranPPL'));
    }
}
