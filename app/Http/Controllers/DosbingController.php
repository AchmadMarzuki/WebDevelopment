<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Dosbing;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class DosbingController extends Controller {
    public function index() {
        $datas = Dosbing::orderBy('nama_dosbing', 'ASC')->get();
        return view('dosbing.index', compact('datas'));
    }

    public function create() {
        return view('dosbing.create');
    }

    public function store(Request $request) {
        $dosbing = array(
            'nama_dosbing' => $request->nama_dosbing,
            'nip' => $request->nip,
            'ahli_bidang' => $request->ahli_bidang,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            );

            DB::table('dosbing')->insert($dosbing);

        if(true){
            alert()->success('Dosen Pembimbing PPL berhasil ditambahkan');
            return redirect()->to('listdosbing');
          }else{
            alert()->warning('Dosen Pembimbing PPL tidak berhasil ditambahkan');
            return redirect()->to('listdosbing');          
        }
    }

    public function show($id) {
        $data = Dosbing::findOrFail($id);
        return view('dosbing.show', compact('data'));
    }
    public function show1() {
        $datas = Dosbing::get();

        return view('dosbing.show1', compact('datas'));
    }

 
    public function edit($id) {   
        $data = Dosbing::findOrFail($id);
        return view('dosbing.edit', compact('data'));
    }
 
    public function update(Request $request, $id) {
        $user_data = Dosbing::findOrFail($id);

        $user_data->nama_dosbing = $request->input('nama_dosbing');
        $user_data->nip = $request->input('nip');
        $user_data->ahli_bidang = $request->input('ahli_bidang');
 
        $user_data->update();
        alert()->success('Dosen Pembimbing PPL berhasil diupdate');
        return redirect()->to('listdosbing');
    }

    public function destroy($id) {
                Dosbing::find($id)->delete();
        alert()->success('Dosen Pembimbing PPL berhasil Berhasil dihapus');
         return redirect()->to('listdosbing');
    }
}