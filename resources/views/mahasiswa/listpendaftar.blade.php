  
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.appmahasiswa')

@section('content')
 
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h1 class="card-title text-center">DATA PENDAFTARAN</h1>
                
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" id="table">
                      <thead>
                        <tr>
                        <th>
                        Status
                        </th>
                          <th>
                            Kode Daftar
                          </th>
                          <th>
                            Nama Mahasiswa
                          </th>
                          <th>
                            Nama Sekolah
                          </th>
                          <th>
                            Waktu mulai
                          </th>
                          <th>
                            Waktu Berakhir
                          </th>
                          <th>
                          validasi SMK
                          </th>
                         
                          <th>
                          validasi Kaprodi
                          </th>
                         
                          <th>
                          validasi Kajur
                          </th>
                        
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($DataPendaftaranPPL as $data)
                        <tr>
                        <td>
                        <?php
                        for ($i=0; $i < $jumlahdata; $i++) { 
                          if ($kode_daftar[$i] == $data->kode_daftar) {
                            if ($jumlah[$i] > 1) {
                              echo "Tim";
                            }else{
                              echo "Individu";
                            }
                          }
                        }
                        ?>
                        </td>
                        <td class="py-1">
                          <a href="{{ route('mhspendaftardetail',$data->mahasiswa_id) }}"> 
                          <p>DETAIL</p>
                            {{$data->kode_daftar}}
                          </a>
                          </td>
                           <td>
                          {{$data->nama}}
                          </td>

                          <td>
                          {{$data->nama_sekolah}}
                          </td>

                           
                          <td>
                           {{date('d/m/y', strtotime($data->waktu_mulai))}}
                          </td>
                          <td>
                            {{date('d/m/y', strtotime($data->waktu_berakhir))}}
                          </td>

                         <td>
                          @if($data->validasiSMK == 'Belum_disetujui')
                            <label class="badge badge-warning">Belum disetujui</label>
                          @else
                            <label class="badge badge-success">Disetujui</label>
                          @endif
                          </td>

                          <td>
                          @if($data->validasiSMK == 'Sudah_disetujui')
                          @if($data->validasiKaprodi == 'Belum_disetujui')
                          <label class="badge badge-warning">Belum disetujui</label>
                            @else
                              <label class="badge badge-success">Disetujui</label>
                            @endif
                          @endif
                          </td>

                          <td>
                          @if($data->validasiSMK == 'Sudah_disetujui' && $data->validasiKaprodi == 'Sudah_disetujui')
                          @if($data->validasiKajur == 'Belum_disetujui')
                          <label class="badge badge-warning">Belum disetujui</label>
                            @else
                              <label class="badge badge-success">Disetujui</label>
                            @endif
                          @endif
                          </td>

                          @if($data->validasiSMK == 'Sudah_disetujui' && $data->validasiKaprodi == 'Sudah_disetujui' && $data->validasiKajur == 'Sudah_disetujui')
          <div class="jumbotron float-center text-center">
                    <h3><font color="white">Selamat, anda berhasil mendaftar, Silahkan Download Form F2A pada link dibawah ini :</font></h3>
                    <br>
                     <!-- <button type="button" class="btn btn-default btn-lg">FORM F2A</button> -->
                     <!-- <link rel="stylesheet" href="{{url('laporan-pdf')}}"> -->
                     <a href="{{url('laporan-pdf')}}" class="btn btn-primary btn-lg"> FORM F2A </a>
                     <a href="{{url('/download')}}" class="btn btn-primary btn-lg"> DOWNLOAD FORM F2A </a>
                   
                  </div>
  
         @endif

                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div> 
          </div>
@endsection