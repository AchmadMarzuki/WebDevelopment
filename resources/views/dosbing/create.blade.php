@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>
@stop

@extends('layouts.appkaprodi')

@section('content')

<form method="POST" action="{{ url('/simpandosbing') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                          <div class="form-group{{ $errors->has('nama_dosbing') ? ' has-error' : '' }}">
                             <label for="nama_dosbing" class="col-md-4 control-label"><h4>Tambah Dosen Pembimbing PPL</h4></label>
                             <br>
                            <label for="nama_dosbing" class="col-md-4 control-label">Nama Dosen Pembimbing</label>
                            <div class="col-md-6">
                                <input id="nama_dosbing" type="text" class="form-control" name="nama_dosbing" value="{{ old('nama_dosbing') }}" required>
                                @if ($errors->has('nama_dosbing'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_dosbing') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  

                         <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                            <label for="nip" class="col-md-4 control-label">NIP</label>
                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control" name="nip" value="{{ old('nip') }}" required>
                                @if ($errors->has('nip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ahli_bidang') ? ' has-error' : '' }}">
                            <label for="ahli_bidang" class="col-md-4 control-label">Ahli bidang</label>
                            <div class="col-md-6">
                                <input id="ahli_bidang" type="text" class="form-control" name="ahli_bidang" value="{{ old('ahli_bidang') }}" required>
                                @if ($errors->has('ahli_bidang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ahli_bidang') }}</strong>
                                    </span>
                                @endif

                                <br>
                                <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{url('/home')}}" class="btn btn-light pull-right">Back</a>
                            </div>
                            
                        </div>
  
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection
