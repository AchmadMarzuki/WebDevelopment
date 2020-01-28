@extends('layouts.appmahasiswa')

@section('content')
 
<div class="row">
 <div class="col-md-12 d-flex justify-content-center">
        <div class="row flex-grow justify-content-center align-items-center container"> 
            <div class="card justify-content-center align-items-center container">
                <div class="col-md-8 mt-1 mx-auto text-center bg-primary text-white float-center border border-info"><h4><strong>DATA DETAIL PENDAFTAR</strong></div>
                    <div class="card-body justify-content-center align-items-center container">      
                  
                    @foreach($PendaftaranPPL as $data)
                    <br>
                    <div class="col-md-5 mt-1 mx-auto text-center bg-primary text-white float-center border border-info"><h4> Mahasiswa </h4> </div>
                     <div class="col-md-5 mx-auto mt-3">
                    <label for="">Kode Daftar  : </label>
                          <input class="form-control" value="{{$data->kode_daftar}}" readonly="">
                         </div>

                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Nama  : </label>
                          <input class="form-control" value="{{$data->nama}}" readonly="">
                         </div>

                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Nama Sekolah  : </label>
                          <input class="form-control" value="{{$data->nama_sekolah}}" readonly="">
                         </div>
                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Dosen Pembimbing  : </label>
                          <input class="form-control" value="{{$data->nama_dosbing}}" readonly="">
                         </div>

                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Waktu Mulai  : </label>
                          <input class="form-control" value="{{$data->waktu_mulai}}" readonly="">
                         </div>

                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Waktu Berakhir  : </label>
                          <input class="form-control" value="{{$data->waktu_berakhir}}" readonly="">
                         </div>

                    <div class="col-md-5 mx-auto mt-3 mb-3">
                    <label for="">Validasi SMK  : </label>
                    @if($data->validasiSMK == 'Belum_disetujui')
                            <label class="badge badge-warning form-control">Belum disetujui</label>
                          @else
                            <label class="badge badge-success form-control">Sudah disetujui</label>
                            @endif
                    </div>

                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Validasi Kaprodi  : </label>
                    @if($data->validasiSMK == 'Sudah_disetujui')
                    @if($data->validasiKaprodi == 'Belum_disetujui')
                          <label class="badge badge-warning form-control">Belum disetujui</label>
                          @else
                            <label class="badge badge-success form-control">Sudah disetujui</label>
                            @endif
                          @endif
                      </div>

                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Validasi Kajur  : </label>
                    @if($data->validasiSMK == 'Sudah_disetujui' && $data->validasiKaprodi == 'Sudah_disetujui')
                    @if($data->validasiKajur == 'Belum_disetujui')
                            <label class="badge badge-warning form-control">Belum disetujui</label>
                            @else
                              <label class="badge badge-success form-control">Sudah disetujui</label>
                              @endif
                          @endif
                         </div>

                         @endforeach
                            <br>
                         <div class="col-md-5 mx-auto">
                     <a href="{{url('listpendaftar')}}" class="btn btn-light pull-left">Back</a>
                   </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
 
@endsection