@section('js')
 <script type="text/javascript">
 
   $(document).on('click', '.pilih_smk', function (e) {
                document.getElementById("nama_sekolah").value = $(this).attr('data-nama_sekolah');
                document.getElementById("informasi_id").value = $(this).attr('data-informasi_id');
                document.getElementById("emailsmk").value = $(this).attr('data-emailsmk');
                $('#myModal1').modal('hide');
            });
 
            $(document).on('click', '.pilih_dosen', function (e) {
                document.getElementById("nama_dosbing").value = $(this).attr('data-nama_dosbing');
                document.getElementById("dosen_id").value = $(this).attr('data-dosen_id');
                $('#myModal2').modal('hide');
            });
 
            $(document).on('click', '.pilih_mahasiswa1', function (e) {
                document.getElementById("nama1").value = $(this).attr('data-nama1'); 
                document.getElementById("anggota_id_1").value = $(this).attr('data-anggota_id_1');
                document.getElementById("nim1").value = $(this).attr('data-nim1');
                document.getElementById("email1").value = $(this).attr('data-email1');
                document.getElementById("sks1").value = $(this).attr('data-sks1');
                $('#myModal3').modal('hide');
            });

            $(document).on('click', '.pilih_mahasiswa2', function (e) {
                document.getElementById("nama2").value = $(this).attr('data-nama2'); 
                document.getElementById("anggota_id_2").value = $(this).attr('data-anggota_id_2');
                document.getElementById("nim2").value = $(this).attr('data-nim2');
                document.getElementById("email2").value = $(this).attr('data-email2');
                document.getElementById("sks2").value = $(this).attr('data-sks2');
                $('#myModal4').modal('hide');
            });

            $(document).on('click', '.pilih_mahasiswa3', function (e) {
                document.getElementById("nama3").value = $(this).attr('data-nama3'); 
                document.getElementById("anggota_id_3").value = $(this).attr('data-anggota_id_3');
                document.getElementById("nim3").value = $(this).attr('data-nim3');
                document.getElementById("email3").value = $(this).attr('data-email3');
                document.getElementById("sks3").value = $(this).attr('data-sks3');
                $('#myModal5').modal('hide');
            });
 

         //individu dan tim option radio
            $(document).ready(function () {
        $('input[type="radio"]').click(function () {
            var demovalue = $(this).val();
            $("div.myDiv").hide();
            $("#show" + demovalue).show();
        });
        
    }); 

    $(document).ready(function() {
    $('#table1').DataTable({
      "iDisplayLength": 50
    });

} );
    $(document).ready(function() {
    $('#table2').DataTable({
      "iDisplayLength": 50
    });

} );
    $(document).ready(function() {
    $('#table3').DataTable({
      "iDisplayLength": 50
    });

} );
 </script>

@stop
@section('css')

@stop
@extends('layouts.appmahasiswa')

@section('content')



<style>
    .myDiv {
        display: none;
  width: 100%;
  padding: 0.56rem 1.375rem;
  font-size: 1rem;
  line-height: 1;
  color: #495057;
  background-color: #ffffff;
  background-clip: padding-box;
  border: 1px solid #ced4da;
  border-radius: 2px;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    #showOne {
         border: 1px solid #3399ff;
 
    }

    #showTwo {
        color: green;
        border: 1px solid #3399ff;
        padding: 10px;
    }

    #message{display:none; color:red; margin-top:-5px!important;}


li {
  display: inline-block;
  cursor: pointer;
}

</style>
 
 
<form method="POST" action="{{ url('/SimpanPendaftaranPPL') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">

  @if(count($errors))
      <div class="alert alert-danger align-items-center container">
       
        <ul>
          @foreach($errors->all() as $error)
          <center><strong><li>{{ $error }}</li></strong> </center>
          @endforeach
        </ul>
      </div>
    @endif

             <div class="col-md-12 d-flex justify-content-center">
              <div class="row flex-grow justify-content-center align-items-center container">
                 
                  <div class="card justify-content-center align-items-center container">
                  <div class="col-md-8 mt-1 mx-auto text-center bg-primary text-white float-center border border-info"><h4><strong>PENDAFTARAN PPL</strong></div>
                    <div class="card-body justify-content-center align-items-center container">
   
                   <div class="col-md-8 mx-auto">
                    <label for="">Kode Daftar</label>
                          <input id="kode_daftar" type="text" class="form-control" name="kode_daftar" value="{{ $kode }}" required readonly="">
                         </div>
                         <br>

                   

<div class="table-active table-striped table-bordered col-md-10 mx-auto text-center">
         <h4>Silahkan pilih salah satu dibawah ini</h4>
 
         <br>
 
  <label for="radio" class="btn btn-info">Individu <input type="radio" name="demo" value="One" required oninvalid="this.setCustomValidity('Tentukan Individu atau Tim')" oninput="setCustomValidity('')"></label>
    
<br>

<div id="showOne" class="myDiv"> 
    <label>Nama : </label>
    <input type="text" readonly="" id="nama" placeholder="nama" name="nama" value="{{ $data_mhs->nama }}">
    <label>NIM : </label>
    <input type="text" readonly="" id="nim" placeholder="nim" name="nim" value="{{ $data_mhs->nim }}">
    <label>SKS : </label>
    <input type="number" readonly="" id="sks" placeholder="sks" name="sks[]" value="{{ $data_mhs->sks }}">
    <input id="ketua_id" type="hidden" name="mahasiswa_id[]" value="{{ $data_mhs->user_id }}" required ="">
</div>
<br>

<label for="radio" class="btn btn-info">TIM <input type="radio" name="demo" value="Two"></label>

<div id="showTwo" class="myDiv"> 
<div id="showTwo">
  <h3>Ketua TIM</h3>
    <label>Nama : </label>
      <input type="text" readonly="" id="nama" placeholder="nama" name="nama[]" value="{{ $data_mhs->nama }}">
    <label>NIM : </label>
    <input type="text" readonly="" id="nim" placeholder="nim" name="nim[]" value="{{ $data_mhs->nim }}">
    <label>SKS : </label>
    <input type="number" readonly="" id="sks" placeholder="sks" value="{{ $data_mhs->sks }}">
    <!-- <input type="text" readonly="" id="email" placeholder="email" name="email[]" value="{{ $data_mhs->email }}"> -->
    <input type="hidden" readonly="" id="email" name="email[]" value="{{ $data_mhs->email }}">
 
    </div>
<br>

 <div class="col-md-8 mx-auto">
<label for="">Anggota 1</label>
          <div class="input-group">

          <!-- jika dibawah ini dihidupkan maka nilai user_id menjadi null  
              <input id="user_id" type="text" class="form-control" required oninvalid="this.setCustomValidity('Silahkan pilih Anggota')" oninput="setCustomValidity('')">  
                sama dengan diatas -->
                <input id="nama1" type="hidden" name="nama[]" value="{{ old('nama1') }}" required ="">
                <input id="nim1" type="hidden" name="nim[]" value="{{ old('nim1') }}" required ="">
                <input id="sks1" type="hidden" name="sks[]" value="{{ old('sks1') }}" required ="">
            <input id="anggota_id_1" type="hidden" name="mahasiswa_id[]" value="{{ old('anggota_id_1') }}" required ="">
            <input id="email1" type="hidden" name="email[]" value="{{ old('email1') }}" required ="">
                <span class="col-md-8 mx-auto">
                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal3"><b>Cari Anggota PPL</b> <span class="fa fa-search">
                    </span>
                </button>
              </span>
          </div> 
      </div>
      <br>

 <div class="col-md-8 mx-auto">
<label for="">Anggota 2</label>
          <div class="input-group">
                <input id="nama2" type="hidden" name="nama[]" value="{{ old('nama2') }}" required ="">
                <input id="nim2" type="hidden" name="nim[]" value="{{ old('nim2') }}" required ="">
                <input id="sks2" type="hidden" name="sks[]" value="{{ old('sks2') }}" required ="">
            <input id="anggota_id_2" type="hidden" name="mahasiswa_id[]" value="{{ old('anggota_id_2') }}" required ="">
            <input id="email2" type="hidden" name="email[]" value="{{ old('email2') }}" required ="">
                <span class="col-md-8 mx-auto">
                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal4"><b>Cari Anggota PPL</b> <span class="fa fa-search">
                    </span>
                </button>
              </span>
          </div> 
      </div>
      
      <br>
 <div class="col-md-8 mx-auto">
<label for="">Anggota 3</label>
          <div class="input-group">
                <input id="nama3" type="hidden" name="nama[]" value="{{ old('nama3') }}" required ="">
                <input id="nim3" type="hidden" name="nim[]" value="{{ old('nim3') }}" required ="">
                <input id="sks3" type="hidden" name="sks[]" value="{{ old('sks3') }}" required ="">
            <input id="anggota_id_3" type="hidden" name="mahasiswa_id[]" value="{{ old('anggota_id_3') }}" required ="">
            <input id="email3" type="hidden" name="email[]" value="{{ old('email3') }}" required ="">
                <span class="col-md-8 mx-auto">
                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal5"><b>Cari Anggota PPL</b> <span class="fa fa-search">
                    </span>
                </button>
              </span>
          </div> 
      </div>
  </div>
<br>
<br>
<!-- 
<div class="col-md-6">
        <div class="form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
          <label for="firstname">First Name:</label>
          <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Enter First Name" value="{{ old('firstname') }}">
          <span class="text-danger">{{ $errors->first('firstname') }}</span>
        </div>
      </div> -->


<div class="col-md-8 mx-auto">
      <label for="informasi_id">SMK</label>
          <div class="input-group">
            <input id="nama_sekolah" type="text" class="form-control {{ $errors->has('informasi_id') ? 'has-error' : '' }}" >
            <input id="informasi_id" type="hidden" name="informasi_id" value="{{ old('informasi_id') }}">
            <input id="emailsmk" type="hidden" name="emailsmk" value="{{ old('emailsmk') }}">

                <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal1"><b>Cari Tempat PPL</b> <span class="fa fa-search">

                    </span>
                </button>
              </span>
          </div>
              <span class="text-danger">{{ $errors->first('informasi_id') }}</span>  
      </div>
  <br>  
 
  <div class="col-md-8 mx-auto">
        <label for="dosen_id">Dosen pembimbing PPL</label>
        <div class="input-group">
                        <input id="nama_dosbing" type="text" class="form-control" {{ $errors->has('dosen_id') ? 'has-error' : '' }}">
<!--               <input id="nama_dosbing" type="text" class="form-control" required oninvalid="this.setCustomValidity('Silahkan pilih Dosen Pembimbing PPL')" oninput="setCustomValidity('dosen_id')"> -->
               <input id="dosen_id" type="hidden" name="dosen_id" value="{{ old('dosen_id') }}" required="">
                <span class="input-group-btn">
                <button type="button" class="btn btn-info btn-secondary" data-toggle="modal" data-target="#myModal2"><b>Cari Dosen pembimbing PPL</b> <span class="fa fa-search">
              </span>
            </button>
          </span>
         </div>
          <span class="text-danger">{{ $errors->first('dosen_id') }}</span>  
    <br>
<br>                   

        <button type="submit" class="btn btn-primary" id="submit">Daftar</button>
        <button type="reset" class="btn btn-danger">Reset</button>
        <a href="{{url('dashboardMahasiswa')}}" class="btn btn-light pull-right">Back</a>
        </div>`
                              
          <br>
          <br>
        <br>
      </div>
    </div>
 
<br>
</form>
 
   <!-- Modal SMK-->
   <div class="modal fade bd-example-modal-lg" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari tempat PPL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
                        <table id="lookup1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Sekolah</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Berakhir</th>
                                    <th>Kuota</th>
                                    <th>Deskripsi</th>
                                    <th>Diposting pada</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($SMK as $data)
                                <tr class="pilih_smk" data-informasi_id="<?php echo $data->id; ?>" data-emailsmk="<?php echo $data->email;?>" data-nama_sekolah="<?php echo $data->nama_sekolah; ?>" >
                                    <td>{{$data->nama_sekolah}}</td>
                                    <td>{{$data->waktu_mulai}}</td>
                                    <td>{{$data->waktu_berakhir}}</td>
                                     <td>{{$data->kuota}}</td>
                                    <td>{{$data->deskripsi}}</td>
                                    <td>{{$data->updated_at}}</td>
                                    <td>{{$data->alamat}}</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>

  <!-- Modal Mahasiswa 1-->
        <div class="modal fade bd-example-modal-lg" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" id="table1">
                    <h4><center>Data Mahasiswa</center></h4>
                      <thead>

                                 <tr>
                                <th>Nomor</th>
                                    <th>Nama Mahasiswa</th>
                                     <th>NIM</th>
                                     <th>SKS</th>
                                    <th>email</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                                @foreach($data_mhs_anggota as $data)
                                <tr class="pilih_mahasiswa1" data-anggota_id_1="<?php echo $data->user_id; ?>" data-email1="<?php echo $data->email; ?>" data-nama1="<?php echo $data->nama; ?>"data-nim1="<?php echo $data->nim?>"data-sks1="<?php echo $data->sks; ?>">
                                <td>{{ $i++ }}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nim}}</td>
                                    <td>{{$data->sks}}</td>
                                    <td>{{$data->email}}</td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
            </div>

  <!-- Modal Mahasiswa 2-->
        <div class="modal fade bd-example-modal-lg" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">                 
      <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" id="table2">
                    <h4><center>Data Mahasiswa</center></h4>
                      <thead>
                                 <tr>
                                <th>Nomor</th>
                                     <th>Nama Mahasiswa</th>
                                     <th>NIM</th>
                                     <th>SKS</th>
                                    <th>email</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1; ?>
                                @foreach($data_mhs_anggota as $data)
                                <tr class="pilih_mahasiswa2" data-anggota_id_2="<?php echo $data->user_id; ?>" data-email2="<?php echo $data->email; ?>" data-nama2="<?php echo $data->nama; ?>"data-nim2="<?php echo $data->nim?>"data-sks2="<?php echo $data->sks; ?>">
                                <td>{{ $i++ }}</td>
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nim}}</td>
                                    <td>{{$data->sks}}</td>
                                    <td>{{$data->email}}</td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
            </div>
  
  <!-- Modal Mahasiswa 2-->
        <div class="modal fade bd-example-modal-lg" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" id="table3">
                    <h4><center>Data Mahasiswa</center></h4>
                      <thead>
                                 <tr>
                                    <th>Nama Mahasiswa</th>
                                     <th>NIM</th>
                                     <th>SKS</th>
                                    <th>email</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_mhs_anggota as $data)
                                <tr class="pilih_mahasiswa3" data-anggota_id_3="<?php echo $data->user_id; ?>" data-email3="<?php echo $data->email; ?>" data-nama3="<?php echo $data->nama; ?>"data-nim3="<?php echo $data->nim?>"data-sks3="<?php echo $data->sks; ?>">
                                    <td>{{$data->nama}}</td>
                                    <td>{{$data->nim}}</td>
                                    <td>{{$data->sks}}</td>
                                    <td>{{$data->email}}</td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
            </div>
  
  <!-- Modal Dosbing -->
  <div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content" style="background: #fff;">
      <div class="modal-body">
                        <table id="lookup4" class="table table-bordered table-hover">
                        <h4><center>Data Mahasiswa</center></h4>
                            <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            NIP
                          </th>
                          <th>
                            Ahli Bidang
                          </th>
                        </tr>
                      </thead>
                            <tbody>
                                @foreach($dosbing as $data)
                                <tr class="pilih_dosen" data-dosen_id="<?php echo $data->id; ?>" data-nama_dosbing="<?php echo $data->nama_dosbing; ?>" >
                                    <td class="py-1">

                            {{$data->nama_dosbing}}
                          </td>
                          <td>
                            {{$data->nip}}
                          </td>
                          <td>
                            {{$data->ahli_bidang}}
                          </td>
                         </tr>
                                @endforeach
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
@endsection