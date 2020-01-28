<?php

namespace App\Http\Controllers;
use App\Mail\ActivationEmail;
use Illuminate\Support\Facades\Validator;
use Mail;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller {
  
    public function index() {
        $datas = User::orderBy('nama', 'ASC')->get();
 
        return view('auth.user', compact('datas'));
    }

    public function createkajur(){
        return view('kajur.register');

    }

    public function create() {
        return view('auth.register');
    }

    public function storekajur(Request $request) {

        $user = new \App\User;

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->level = ('Kajur');
        $user->password = bcrypt(($request->input('password')));
        $user->remember_token = str_random(60);
        $user->save();

        $data_user = User::select('id')->where('email', $request->email)->first();
         
        $kajur = new \App\Kajur;
        $kajur->nama_kajur = $request->nama;
        $kajur->email = $request->email;
        $user->level = ('Kajur');
        $kajur->user_id = $data_user->id;
        $kajur->save();

        alert()->success('Kajur Berhasil Ditambahkan');
        return redirect()->back();
    }
    
    public function store(Request $request) {
        $count = User::where('email',$request->input('email'))->count();

        if($count>0){
            Session::flash('message', 'Already exist!');
            Session::flash('message_type', 'danger');
            return redirect()->to('user');
        }

        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
        ]);

        if($request->file('gambar') == '') {
            $gambar = NULL;

    }else{
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gambar')->move("images/user", $fileName);
            $gambar = $fileName;
        }

        User::create([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'level' => $request->input('level'),
            'password' => bcrypt(($request->input('password'))),
            'gambar' => $gambar]);

        Session::flash('message', 'Berhasil ditambahkan!');
        Session::flash('message_type', 'success');
        return redirect()->route('user.index');
    }
 
    public function Activation($token) {
        $user = User::where('token', $token)->first();
        if(isset($user)){
            if(!$user->verified) {
                $user->is_verified = 1;
                $user->save();
                $status = "Email anda Telah Terverifikasi. anda sudah bisa masuk kedalam akun anda.";
            }  
            
        } else {
            return redirect('/login')->with('warning', "Maaf Email Tidak dapat di identifikasi.");
        }
 
        return redirect('/login')->with('status', $status);
    }
 
    public function edit($id) {   
 
        $data = User::findOrFail($id);
        return view('auth.edit', compact('data'));
    }
 
    public function update(Request $request, $id) {
        $user_data = User::findOrFail($id);

        if($request->file('gambar')) {
            $file = $request->file('gambar');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gambar')->move("images/user", $fileName);
            $user_data->gambar = $fileName;
        }

        $user_data->nama = $request->input('nama');
        $user_data->email = $request->input('email');
        if($request->input('password')) {
        $user_data->level = $request->input('level');
        }

        if($request->input('password')) {
            $user_data->password= bcrypt(($request->input('password')));
        }

        $user_data->update();
        Session::flash('message', 'Berhasil diubah!');
        Session::flash('message_type', 'success');
        return redirect()->to('home');
    }

    public function destroy($id) {
        User::find($id)->delete();
        Mahasiswa::find($id)->delete();
        SMK::find($id)->delete();
        alert()->success('User berhasil dihapus');
        return redirect()->back();
  
    }
}