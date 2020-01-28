@section('js')
@stop

@extends('layouts.appkajur')

@section('content')
@foreach($kaprodi as $data)
<form action="{{ route('kaprodi.updateprofile', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
        <div class="row">
<div class="col-md-12 d-flex justify-content-center">
        <div class="row flex-grow justify-content-center align-items-center container"> 
            <div class="card justify-content-center align-items-center container">
            <br>
                <div class="col-md-8 mt-1 mx-auto text-center bg-primary text-white float-center border border-info"><h4><strong><b>{{$data->nama}}</b> melakukan Edit Akun</strong></div>
                    <div class="card-body justify-content-center align-items-center container">  

                    <div class="col-md-8 mx-auto">
                    <label for="">Nama Sekolah</label>
                          <input id="nama_sekolah" type="text" class="form-control" name="nama" value="{{$data->nama}}" required>
                         </div>
                        <br>
                    <div class="col-md-8 mx-auto">
                    <label for="">G-Mail</label>
                          <input id="email" type="text" class="form-control" name="email" value="{{$data->email}}" required>
                         </div>
                        <br>
                        <br>

                    <div class="col-md-8 mx-auto">
                    <label for="Gambar" class="col-md-2 control-label">Gambar</label>
                    <img class="product" width="200" height="200" @if($data->gambar) src="{{ asset('images/user/'.$data->gambar) }}" @endif />
                    <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">
                         </div>
                        <br>
                        <br>
                    <div class="col-md-8 mx-auto">
                    <label for="">Password Lama atau membuat Password Baru</label>
                          <input id="password" type="text" class="form-control" name="password" required oninvalid="this.setCustomValidity('Silahkan masukkan Password lama atau Password baru')" oninput="setCustomValidity('')">
                      
 
                        <br>
                                 <button type="submit" class="btn btn-success btn-lg" id="submit">
                                    Update
                        </button>
                        <a href="{{url('dashboardKaprodi')}}" class="btn btn-primary pull-right">Kembali ke Halaman Utama</a>
                        @endforeach

                    </div>
                </div>
           </div>
        </div>
    </div>
</div>
</form>
@endsection