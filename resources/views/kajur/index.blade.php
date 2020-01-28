
@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')
<div class="row">
 
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
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
                          validasi Kajur
                          </th>
                         
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($pendaftaranppl as $data)
                        <tr>
                        <td class="py-1">
                          <a href="{{url('pendaftardetail')}}"> 
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
                          @if($data->validasiKajur == 'Belum_disetujui')
                            <label class="badge badge-warning">Belum disetujui</label>
                          @else
                            <label class="badge badge-success">Disetujui</label>


                          @endif
                          </td>
                          <td>
                          
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                          @if($data->validasiKajur == 'Belum_disetujui')
                          <form action="{{ route('kajur.validasi', $data->id) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin data ini sudah Disetujui?')"> Sudah Disetujui
                            </button>
                          </form>
                          @endif
                            <form action="{{ route('kajur.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete {{$data->id}}
                            </button>
                          </form>
                          </div>
                        </div>
 
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