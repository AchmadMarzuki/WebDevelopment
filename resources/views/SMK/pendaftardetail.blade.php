@extends('layouts.appSMK')

@section('content')
 
<div class="row">
 <div class="col-md-12 d-flex justify-content-center">
        <div class="row flex-grow justify-content-center align-items-center container"> 
            <div class="card justify-content-center align-items-center container">
                    <div class="card-body justify-content-center align-items-center container">      
                    <?php $i=1; ?>
                    @foreach($PendaftaranPPL as $data)
                    <br>

                  <div class="card">
                      <div class="card-header text-purple">
                      <center>KODE PENDAFTAR {{$data->kode_daftar}}</center>
                      </div>
                      <div class="card card-outline-primary">
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
                         @if(Auth::user()->level == 'Kaprodi')
                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Validasi Kaprodi  : </label>
                    @if($data->validasiKaprodi == 'Belum_disetujui')
                     <!-- <label class="badge badge-warning form-control">Belum disetujui</label> -->
                             <form action="{{ route('kaprodi.validasi', $data->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="badge badge-warning form-control" onclick="return confirm('Anda yakin data ini sudah Disetujui?')"> Belum disetujui
                            </button>
                          </form>
                          @else
                            <label class="badge badge-success form-control">Sudah disetujui</label>
                            @endif
                         </div>
                         @endif
<br>
                         @if(Auth::user()->level == 'Kajur')
                    <div class="col-md-5 mx-auto mt-3">
                    <label for="">Validasi Kajur  : </label>
                    @if($data->validasiKajur == 'Belum_disetujui')
                              <!-- <form action="{{ route('kajur.validasi', $data->id)}}" method="post" enctype="multipart/form-data" required readonly="">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="badge badge-warning form-control" onclick="return confirm('Anda yakin data ini sudah Disetujui?')"> Belum disetujui
                          </form> -->
                           @else
                            <label class="badge badge-success form-control">Sudah disetujui</label>
                            @endif
                         </div>
                        @endif
                        <br>
                  @if(Auth::user()->level == 'SMK')
                    <div class="col-md-5 mx-auto mt-3 mb-3">
                    <label for="">Validasi SMK  : </label>
                    @if($data->validasiSMK == 'Belum_disetujui')
                              <form action="{{ route('SMK.validasi', $data->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="badge badge-warning form-control" onclick="return confirm('Anda yakin data ini sudah Disetujui?')"> Belum disetujui
                          </form>
                           @else
                            <label class="badge badge-success form-control">Sudah disetujui</label>
                            @endif
                         </div>
                         @endif
                         <br>
                    </div>
                </div>
             @endforeach
          <br>
        <div class="col-md-5 mx-auto">
      <a href="{{url('listsudahdivalidasismk')}}" class="btn btn-primary pull-center">Kembali</a>
      </div>
    </div>
  </div>
</div>
</div> 
</div>
@endsection