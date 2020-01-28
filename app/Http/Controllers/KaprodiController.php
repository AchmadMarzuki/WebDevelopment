<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Kaprodi;
use App\Mahasiswa;
use App\PendaftaranPPL;
use App\SMK;
use App\Dosbing;
use App\Notifications\NotifValidasiKaprodi\notifvalidasikaprodi;
use App\Notifications\NotifValKajur\notifvalkajur;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class KaprodiController extends Controller {
     
    public function __construct() {
        $this->middleware('auth');
    }
    public function DashboardKaprodi() {
        return view('kaprodi.Dashboard');
    }

    public function listmhspti(){
        $datalistmhs = Mahasiswa::get();
         return view('kaprodi.listSeluruhMhsPti', compact('datalistmhs'));
    }
 
    public function listPostingsmk(){
        $datas = SMK::get()->where('kuota', '!=', null);
        return view('kaprodi.listPostingSMK', compact('datas'));
    }

    public function listbelumdivalidasi() {
        $pendaftaranppl = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
        ->join('mahasiswa', 'mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('PendaftaranPPL.kode_daftar','PendaftaranPPL.mahasiswa_id', 'PendaftaranPPL.id', 'mahasiswa.nama','mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
         ->where('validasiKaprodi', 'Belum_disetujui')
        ->get();

        $status = DB::table('PendaftaranPPL')->select(DB::raw('COUNT(kode_daftar) AS jumlah'), 'kode_daftar')->groupBy('kode_daftar')->get();        
        $i=0;
        foreach ($status as $data) {
           $kode_daftar[$i] = $data->kode_daftar;
           $jumlah[$i] = $data->jumlah;
           $i++;
        }
        $jumlahdata = count($status);
        return view('kaprodi.belumdivalidasi', compact('pendaftaranppl', 'kode_daftar', 'jumlah','jumlahdata'));
 
    }

    public function listsudahdivalidasi() {
         $users = User::get();
        $dosbing = Dosbing::get();
         
        $pendaftaranppl = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
        ->join('mahasiswa', 'mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('PendaftaranPPL.kode_daftar','PendaftaranPPL.mahasiswa_id', 'PendaftaranPPL.id', 'mahasiswa.nama','mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
        ->where('validasiKaprodi', 'Sudah_disetujui')
        ->get();

        $status = DB::table('PendaftaranPPL')->select(DB::raw('COUNT(kode_daftar) AS jumlah'), 'kode_daftar')->groupBy('kode_daftar')->get();        
        $i=0;
        foreach ($status as $data) {
           $kode_daftar[$i] = $data->kode_daftar;
           $jumlah[$i] = $data->jumlah;
           $i++;
        }
        $jumlahdata = count($status);
         return view('kaprodi.sudahdivalidasi', compact('pendaftaranppl','kode_daftar', 'jumlah','jumlahdata'));
 
    }
 
    public function melakukanvalidasi(Request $request, $id) {
        $pendaftaranppl = PendaftaranPPL::find($id);

        $emailMahasiswa = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
        ->join('mahasiswa', 'mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('mahasiswa.email' , 'mahasiswa.nama', 'SMK.nama_sekolah')
         ->where('pendaftaranppl.id', $id)
         ->get();
          foreach ($emailMahasiswa as $notifmails){
          Mail::to($notifmails->email)->send(new notifvalidasikaprodi($notifmails->nama));
          $EmailKajur = 'kajurpti@gmail.com';
          Mail::to($EmailKajur)->send(new notifvalkajur($notifmails->nama, $notifmails->nama_sekolah));
         }

        $pendaftaranppl->update([
                'validasiKaprodi' => 'Sudah_disetujui'
                ]);
 
        alert()->success('Berhasil.','Mahasiswa telah divalidasi!');
        return redirect()->to('sudahdivalidasiKaprodi');
    }

    public function halamaneditprofile() {   
        $kaprodi = DB::table('users')
      ->where('users.id', Auth::user()->id)
        ->get();
        return view('kaprodi.edit', compact('kaprodi'));
}

public function updateprofile(Request $request, $id){
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
        'password' => bcrypt(($request->input('password'))),
             ]);

    alert()->success('Kaprodi.','Berhasil di Update!');
    return redirect()->to('dashboardKaprodi');
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
    return view('kaprodi.pendaftardetail', compact('PendaftaranPPL'));
}
    public function hapus($user_id) {   
        DB::table('mahasiswa')->where('user_id',$user_id)->delete();
         alert()->warning('Mahasiswa berhasil dihapus');
        return redirect()->back();
     }
     
}

    //      $datalistmhs = DB::table('users')
    //     ->join('mahasiswa', 'mahasiswa.user_id', '=', 'users.id')
    //     ->select('users.id','users.nama','users.nim','users.email','mahasiswa.nim','mahasiswa.sks','users.level')
    //    ->get();
