@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.appkaprodi')

@section('content')

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Detail <b>{{$data->nama_dosen}}</b></h4>
                      <form class="forms-sample">
                        <div class="form-group">
                            <div class="col-md-6">
                                <img class="product" width="200" height="200" @if($data->user->gambar) src="{{ asset('images/user/'.$data->user->gambar) }}" @endif />
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_dosen') ? ' has-error' : '' }}">
                            <label for="nama_dosen" class="col-md-4 control-label">Nama Dosen</label>
                            <div class="col-md-6">
                                <input id="nama_dosen" type="text" class="form-control" name="nama_dosen" value="{{ $data->nama_dosen }}" readonly>
                                @if ($errors->has('nama_dosen'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_dosen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">NIP</label>
                            <div class="col-md-6">
                                <input id="nip" type="number" class="form-control" name="nip" value="{{ $data->nip }}" maxlength="8" readonly>
                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
 

                        <!-- <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;">
                            <label for="user_id" class="col-md-4 control-label">User Login</label>
                            <div class="col-md-6">
                            <input id="tgl_lahir" type="text" class="form-control" name="tgl_lahir" value="{{ $data->user->username }}" readonly="">
                            </div>
                        </div> -->
                        <a href="{{route('dosbing.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection