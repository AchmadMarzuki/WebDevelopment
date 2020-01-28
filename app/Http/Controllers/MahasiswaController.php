<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SMK;
use App\Fakultas;
use App\Prodi;
use App\Dosbing;
use App\PendaftaranPPL;
use App\Mahasiswa;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Mail\ActivationEmail;
use Mail;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class MahasiswaController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }
    public function Dashboard() {
      return view('mahasiswa.Dashboard');
}
    public function daftarDosbing() {
        $datadosbing = Dosbing::get();

        return view('mahasiswa.daftarDosbing', compact('datadosbing'));
    }

    public function listPostingsmk(){
        $datasmk = SMK::get()->where('kuota', '!=', null);
        return view('mahasiswa.daftarsmk', compact('datasmk'));
    }
   
    public function PendaftaranPPL() {
       // $data_mhs_anggota = PendaftaranPPL::select('kode_daftar')->first();
    $DataPendaftaranPPL = DB::table('PendaftaranPPL')
    ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
     ->join('mahasiswa','mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
    ->select('PendaftaranPPL.kode_daftar', 'PendaftaranPPL.mahasiswa_id', 'mahasiswa.nama','mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah','SMK.waktu_mulai', 'SMK.waktu_berakhir', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
    ->where('PendaftaranPPL.mahasiswa_id', Auth::user()->id)
    ->get();

    $status = DB::table('PendaftaranPPL')->select(DB::raw('COUNT(kode_daftar) AS jumlah'), 'kode_daftar')->groupBy('kode_daftar')->get();        
    $i=0;
    foreach ($status as $data) {
       $kode_daftar[$i] = $data->kode_daftar;
       $jumlah[$i] = $data->jumlah;
       $i++;
    }
    $jumlahdata = count($status);

    return view('mahasiswa.listpendaftar', compact('DataPendaftaranPPL','kode_daftar', 'jumlah','jumlahdata'));    
}

    public function TambahMahasiswa() {
        return view('kaprodi.TambahMahasiswa');
    }
 
    public function store(Request $request) {

        $user = new \App\User;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->nim = $request->nim;
        $user->level = ('Mahasiswa');
        $user->password = bcrypt(('password'));
        $user->remember_token = str_random(60);
        $user->token = str_random(40);
        // $user->is_verified = (1);
        $user->save();

    if($request->sks < 120){
        alert()->warning('SKS anda tidak memenuhi syarat!');
        return redirect()->back();
    }

        $data_user = User::select('id')->where('email', $request->email)->first();
        $prodi = Prodi::select('id')->where('nama_prodi', 'Pendidikan Teknologi Informasi')->first();

        $mahasiswa = new \App\Mahasiswa;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->email = $request->email;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->sks = $request->sks;
        $mahasiswa->prodi_id = $prodi->id;
        $mahasiswa->user_id = $data_user->id;
         $mahasiswa->save();

         Mail::to($user->email)->send(new ActivationEmail($user));
        //  alert()->success('Berhasil Mendaftar, Silahkan verifikasi akun anda pada link di Email anda');
        //   return redirect()->to('/login');

          alert()->success('Mahasiswa berhasil Ditambahkan');
         return redirect()->to('listmhspti');
    }
           
    public function show($id) {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function mhspendaftardetail($mahasiswa_id) {
            $data_mhs_anggota = PendaftaranPPL::select('kode_daftar')->where('mahasiswa_id' ,'=', $mahasiswa_id)->first();
            $PendaftaranPPL = DB::table('PendaftaranPPL')
            ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
             ->join('dosbing','dosbing.id', '=', 'PendaftaranPPL.dosbing_id')
             ->join('mahasiswa','mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
            ->select('PendaftaranPPL.kode_daftar', 'mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'dosbing.nama_dosbing','SMK.waktu_mulai','PendaftaranPPL.id', 'SMK.waktu_berakhir', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
            ->where('kode_daftar', $data_mhs_anggota->kode_daftar)
            ->get();
            //return dd($PendaftaranPPL);
            return view('mahasiswa.pendaftardetail', compact('PendaftaranPPL'));
        }
 
    public function edit() {   
        $dataeditmhs = DB::table('users')
        ->join('mahasiswa', 'mahasiswa.user_id', '=', 'users.id')
        ->select('users.nama', 'users.email','users.gambar', 'users.password','users.id','mahasiswa.sks', 'mahasiswa.nim','mahasiswa.prodi_id')
      ->where('users.id', Auth::user()->id)
        ->get();
         
        return view('mahasiswa.edit', compact('dataeditmhs'));
    }

    public function update(Request $request, $id) {
 
             $user_update = User::where('id', $id);
            $user_update->update([
            'nama'=>$request->nama, 
            'nim'=>$request->nim,
            'email'=>$request->email,
            'password' => bcrypt(($request->input('password'))),
            'remember_token' => str_random(60),
            'token' => str_random(40)
        ]);

            $mhs_update = Mahasiswa::where('user_id', $id);
            $mhs_update->update([
            'nama'=>$request->nama, 
            'nim'=>$request->nim,
            'email'=>$request->email
        ]);
        alert()->success('Mahasiswa Berhasil.','melakukan Update!');
        return redirect()->to('dashboardMahasiswa');
    }

    public function generatePDF(){
        $data = ['title' => 'Welcome'];
        $pdf = PDF::loadView('myPDF', $data);
return $pdf->stream();
    }
}