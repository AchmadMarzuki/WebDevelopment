
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.appkaprodi')

@section('content')
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h1 class="card-title text-center">DAFTAR MAHASISWA BELUM DIVALIDASI OLEH KAPRODI</h1>
                
                  
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
                          validasiKaprodi
                          </th>
                         
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pendaftaranppl as $data)

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
                        <a href="{{ route('pendaftardetail',$data->mahasiswa_id) }}"> 
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
                          @if($data->validasiKaprodi == 'Belum_disetujui')
                            <label class="badge badge-warning">Belum disetujui</label>
                          @else
                            <label class="badge badge-success">Sudah disetujui</label>
                           @endif
                          </td>
                          <td>
                          <form action="{{ route('kaprodi.validasi', $data->id)}}" method="post" enctype="multipart/form-data" required readonly="">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="badge badge-success form-control" onclick="return confirm('Anda yakin data ini sudah Disetujui?')">Lakukan Validasi
                          </form>
                        </td>
                        </tr>
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