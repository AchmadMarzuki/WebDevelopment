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
                  <h1 class="card-title text-center">DATA INFORMASI PPL</h1>
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
                            Waktu Posting
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
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
                            {{$data->updated_at}}
                          </td>                        
                           <td>
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{ url('/lakukanposting') }}"> Edit </a>
                            <form action="{{ route('SMK.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
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
