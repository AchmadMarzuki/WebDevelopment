@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.appmahasiswa')

@section('content')

<div class="row" style="margin-top: 5px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h3 class="card-title"><h3><center>Dosen Pembimbing PPL</h3></center></h3>
                  
                  <div class="table-responsive">
                    <table class="table table-striped  table-bordered text-center" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nama Dosen
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
                      @foreach($datadosbing as $data)
                        <tr>
                        <td>
                            {{$data->nama_dosbing}}
                        </td>

                        <td>
                          {{$data->nip}}
                        </td>
                        <td>
                          {{$data->ahli_bidang}}
                        </td>
 


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
  