@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.appkaprodi')
@section('content')
 
<div class="row" style="margin-top: 4px;">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
          <div>
            <a href="{{ url('/TambahMahasiswa') }}" class="btn btn-primary btn-rounded btn-fw mb-3 mt-1 ml-1"><i class="fa fa-plus"></i> Tambah Mahasiswa</a>
            <h4><center><b> SELURUH MAHASISWA PROGRAM STUDI PENDIDIKAN TEKNOLOGI INFORMASI FILKOM UB</b></center></h4>
          </div>
                <div class="card-body">
                   <div class="table-responsive">
                    <table class="table table-striped  table-bordered text-center" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            NIM
                          </th>
                          <th>
                            SKS
                          </th>
 
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datalistmhs as $data)
                        <tr>
                        <td>
                            {{$data->nama}}
                        </td>

                        <td>
                          {{$data->nim}}
                        </td>
                        <td>
                          {{$data->sks}}
                        </td>

  
                          <td>
                           <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                              <a href="/hapusmhs/{{ $data->user_id }}">
 
                             {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
 

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
 
 
 