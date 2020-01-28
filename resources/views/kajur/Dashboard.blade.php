@extends('layouts.appkajur')

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
                    <i class="mdi mdi-check-all mr-1" aria-hidden="true"></i>Total seluruh mahasiswa sudah divalidasi
                  </p>
                  <div class="fluid-container">
                        <h3 class="font-weight-medium mb-0"></h3>
                        <a href="{{url('listbelumdivalidasi')}}"> Show </a>
                      </div>
                </div>
              </div>
            </div>
                        
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card text-center">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="clearfix">
                <div class="float">
                  <i class="mdi mdi-account-multiple-plus text-success icon-lg"></i>
                </div>
                <div class="float">
                  <p class="mb-0">Dosen Pembimbing PPL</p>
                </div>
              </div>
              <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-account-multiple-plus mr-1" aria-hidden="true"></i>Total seluruh dosen Pembimbing PPL
              </p>
              <div class="fluid-container">
                    <h3 class="font-weight-medium mb-0"> </h3>
                    <a href="{{url('listdosbing')}}"> Show </a>
                  </div>
            </div>
          </div>
          </div>
        </div> 
@endsection


 