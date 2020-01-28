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
                  <h1 class="card-title text-center">DAFTAR SELURUH SMK YANG MENERIMA MAHASISWA PPL</h1>
                  <div class="table-responsive">
                    <table class="table table-bordered text-center" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nama Sekolah
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Alamat
                          </th>
                          <th>
                            Deskripsi
                          </th>
                          <th>
                            Kuota
                          </th>
                          <th>
                            Waktu Mulai
                          </th>
                          <th>
                          Waktu Berakhir
                          </th>
                           <th>
                            Waktu Posting
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datasmk as $data)
                        <tr>
                          <td class="py-1">
                            {{$data->nama_sekolah}}
                          </a>
                          </td>
                          
                          <td>
                          
                            {{$data->email}}
                          
                          </td>

                          <td>
                            {{$data->alamat}}
                          </td>
                          <td>
                            {{$data->deskripsi}}
                          </td>
                          <td>
                            {{$data->kuota}}
                          </td>                    
                          <td>
                            {{$data->waktu_mulai}}
                          </td>                    
                          <td>
                            {{$data->waktu_mulai}}
                          </td>                    
                           <td>
                            {{$data->updated_at}}
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
