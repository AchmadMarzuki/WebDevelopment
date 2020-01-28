@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 50
    });

} );
</script>
@stop
@extends('layouts.appSMK')

@section('content')
<div class="row">
 
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card text-center">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float">
                      <i class="mdi mdi-check-all text-success icon-lg"></i>
                    </div>
                    <div class="float">
                      <p class="mb-0">Validasi Pendaftaran PPL</p>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-check-all mr-1" aria-hidden="true"></i> Total seluruh Pendaftaran PPL
                  </p>
                  <div class="fluid-container">
                        <h3 class="font-weight-medium mb-0"></h3>
                        <a href="{{url('listvalidasismk')}}"> Show </a>
                      </div>
                </div>
              </div>
            </div>
  
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card text-center">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float text-center">
                      <i class="mdi mdi-newspaper text-success icon-lg" style="width: 40px;height: 40px;"></i>
                    </div>
                    <div class="float">
                      <p class="mb-0">Daftar informasi yang sudah diposting</p>
                      <div class="fluid-container">
 
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-book mr-1" aria-hidden="true"></i> Informasi PPL sudah di Posting
                  </p>
                  <h3 class="font-weight-medium mb-0"></h3>
                  <a href="{{url('listPosting')}}"> Show </a>
                </div>
              </div>
            </div>
            </div>
 

 
@endsection
