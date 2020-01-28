<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\SMK;
use App\PendaftaranPPL;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Notifications\NotifValidasiSMK\notifvalidasismk;
use App\Notifications\NotifValkap\notifvalkap;
use App\Mail\ActivationEmail;
use Auth;
use DB;
use Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SMKController extends Controller {
    public function DashboardSMK() {
             return view('SMK.Dashboard');
}
    public function listPosting() {
            $SMK = SMK::select('alamat','waktu_berakhir')->where('user_id', Auth::user()->id)->get();
            $today=date ("Y-m-d");
 
         foreach ($SMK as $smk){
           if ($smk->alamat == null){
            alert()->warning('Anda Belum melakukan Posting');
                return view('SMK.Dashboard');
            }
            if ($smk->waktu_berakhir < $today){
               alert()->warning('waktu berakhir masih berlaku');
                    return view('SMK.Dashboard');
        } else {
            $datas = DB::table('SMK')->where('user_id', Auth::user()->id)->get();     
            return view('SMK.listPosting', compact('datas'));
        }
    }
}

    public function listbelumdivalidasi() {
        $pendaftaranppl = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
         ->join('dosbing','dosbing.id', '=', 'PendaftaranPPL.dosbing_id')
         ->join('mahasiswa', 'mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('PendaftaranPPL.kode_daftar', 'PendaftaranPPL.mahasiswa_id', 'PendaftaranPPL.id', 'mahasiswa.nama','mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'dosbing.nama_dosbing','SMK.waktu_mulai', 'SMK.waktu_berakhir', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
        ->where('SMK.user_id', Auth::user()->id)->where('validasiSMK', 'Belum_disetujui')
        ->get();

        $status = DB::table('PendaftaranPPL')->select(DB::raw('COUNT(kode_daftar) AS jumlah'), 'kode_daftar')->groupBy('kode_daftar')->get();        
        $i=0;
        foreach ($status as $data) {
           $kode_daftar[$i] = $data->kode_daftar;
           $jumlah[$i] = $data->jumlah;
           $i++;
        }
        $jumlahdata = count($status);
         
        return view('SMK.belumdivalidasi', compact('pendaftaranppl', 'mahasiswa', 'SMK', 'kode_daftar', 'jumlah','jumlahdata'));
}

    public function listsudahdivalidasismk() {
        $pendaftaranppl = DB::table('PendaftaranPPL')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
         ->join('dosbing','dosbing.id', '=', 'PendaftaranPPL.dosbing_id')
         ->join('mahasiswa', 'mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
        ->select('PendaftaranPPL.kode_daftar', 'PendaftaranPPL.mahasiswa_id', 'PendaftaranPPL.id', 'mahasiswa.nama','mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'dosbing.nama_dosbing','SMK.waktu_mulai', 'SMK.waktu_berakhir', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
        ->where('SMK.user_id', Auth::user()->id)->where('validasiSMK', 'Sudah_disetujui')
        ->get();

        $status = DB::table('PendaftaranPPL')->select(DB::raw('COUNT(kode_daftar) AS jumlah'), 'kode_daftar')->groupBy('kode_daftar')->get();        
        $i=0;
        foreach ($status as $data) {
           $kode_daftar[$i] = $data->kode_daftar;
           $jumlah[$i] = $data->jumlah;
           $i++;
        }
        $jumlahdata = count($status);        
        return view('SMK.sudahdivalidasi', compact('pendaftaranppl', 'mahasiswa', 'SMK', 'kode_daftar', 'jumlah','jumlahdata'));
}
 
    public function smkcreate() {
        return view('auth.smkregister');
}

public function smkstore(Request $request) {
    $count = User::where('email',$request->input('email'))->count();

    if($count>0){
        alert()->warning('email ini telah terdaftar');
         return redirect()->back();
    }

        $user = User::create([
            'nama' => $request->input('nama_sekolah'),
             'email' => $request->input('email'),
            'level' => ('SMK'),
            'password' => bcrypt(($request->input('password'))),
            'remember_token' => str_random(60),
            'token' => str_random(40)]);
            
            $data_user = User::select('id')->where('email', $request->email)->first();
         
            $smk = new \App\SMK;
            $smk->nama_sekolah = $request->nama_sekolah;
            $smk->email = $request->email;
            $smk->user_id = $data_user->id;
            $smk->save();

            Mail::to($user->email)->send(new ActivationEmail($user));
            
             alert()->success('Berhasil Mendaftar, Silahkan verifikasi akun anda pada link di Email anda');
             return redirect()->to('/login');
    }

    public function editprofile() {   
        $data = DB::table('users')
        ->join('SMK', 'SMK.user_id', '=', 'users.id')
        ->select('users.nama', 'users.email','users.gambar', 'users.password','users.id')
      ->where('users.id', Auth::user()->id)
        ->get();
        return view('SMK.edit', compact('data'));
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
    $update->update(['nama'=>$request->nama]);
    $update->update(['email'=>$request->email]);
    $update->update(['password'=>bcrypt(($request->input('password')))]);
    $smk_update = SMK::where('user_id', $id);
        $smk_update->update(['nama_sekolah'=>$request->nama]);
        $smk_update->update(['email'=>$request->email]);

        alert()->success('SMK.','Berhasil di Update!');
    return redirect()->to('DashboardSMK');
}

    public function validasiSMK(Request $request, $id) {
        $pendaftaranppl = PendaftaranPPL::find($id);

        $emailMahasiswa = DB::table('PendaftaranPPL')
        ->join('mahasiswa', 'mahasiswa.user_id', '=', 'pendaftaranppl.mahasiswa_id')
        ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
        ->select('mahasiswa.email' , 'mahasiswa.nama','SMK.nama_sekolah')
         ->where('pendaftaranppl.id', $id)
         ->get();
 
         foreach ($emailMahasiswa as $notifmails){
          Mail::to($notifmails->email)->send(new notifvalidasismk($notifmails->nama, $notifmails->nama_sekolah));
          $EmailKaprodi = 'kaprodipti@gmail.com';
          Mail::to($EmailKaprodi)->send(new notifvalkap($notifmails->nama, $notifmails->nama_sekolah));
         }

        $pendaftaranppl->update([
                'validasiSMK' => 'Sudah_disetujui']);
                if (true) {
                    alert()->success('Berhasil.','Mahasiswa telah divalidasi!');
                    return redirect()->to('listsudahdivalidasismk');
                }
}

    public function lakukanposting() {   
        $datas = DB::table('SMK')->where('user_id', Auth::user()->id)->get();     
        return view('SMK.Posting', compact('datas'));
    }
        

public function Posting(Request $request, $id) {
    $datasmk = SMK::find($id);
   
    $datasmk->update([
        'nama_sekolah' => $request->nama_sekolah,
        'alamat' => $request->alamat,
        'waktu_mulai' => $request->waktu_mulai,
        'waktu_berakhir' => $request->waktu_berakhir,
        'deskripsi' => $request->deskripsi,
        'kuota' => $request->kuota,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now()]);

     if($datasmk){
        alert()->success('informasi PPL berhasil diposting');
        return redirect()->to('listPosting');
      }else{
        alert()->warning('Dosen Pembimbing PPL tidak berhasil ditambahkan karena sudah ada di list');
        return redirect()->to('listPosting');          
    }
}

public function detailpendaftar($mahasiswa_id) {
    $data_mhs_anggota = PendaftaranPPL::select('kode_daftar')->where('mahasiswa_id' ,'=', $mahasiswa_id)->first();
    $PendaftaranPPL = DB::table('PendaftaranPPL')
    ->join('SMK', 'SMK.id', '=', 'PendaftaranPPL.smk_id')
     ->join('dosbing','dosbing.id', '=', 'PendaftaranPPL.dosbing_id')
     ->join('mahasiswa','mahasiswa.user_id', '=', 'PendaftaranPPL.mahasiswa_id')
    ->select('PendaftaranPPL.kode_daftar', 'mahasiswa.nama', 'mahasiswa.nim', 'mahasiswa.sks', 'SMK.nama_sekolah', 'dosbing.nama_dosbing','SMK.waktu_mulai','PendaftaranPPL.id', 'SMK.waktu_berakhir', 'PendaftaranPPL.validasiSMK', 'PendaftaranPPL.validasiKajur', 'PendaftaranPPL.validasiKaprodi')
    ->where('kode_daftar', $data_mhs_anggota->kode_daftar)
    ->get();
    //return dd($PendaftaranPPL);
    return view('SMK.pendaftardetail', compact('PendaftaranPPL'));
}

public function destroy($id) {
       $update = SMK::find($id);
    $update->update(['nama_sekolah'=>'', 'alamat'=>'', 'deskripsi'=>'']);
        alert()->success('Berhasil.','Data telah dihapus!');
     return redirect()->to('dashboardSMK');
    }
}