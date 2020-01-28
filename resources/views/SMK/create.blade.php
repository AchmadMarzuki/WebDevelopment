@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.appSMK')

@section('content')

<form method="POST" action="{{ url('/simpanSMK') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah info PPL baru</h4>

<!-- 
                      <div class="form-group{{ $errors->has('informasi_id') ? ' has-error' : '' }}">
                            <label for="informasi_id" class="col-md-4 control-label">Informasi ID</label>
                            <div class="col-md-6">
                                <input id="informasi_id" type="number" class="form-control" name="informasi_id" value="{{ old('informasi_id') }}" required>
                                @if ($errors->has('informasi_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('informasi_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> -->

                      <input type="hidden" name="id" value="{{Auth::user()->id}}">
                    <?php 
                    // echo Auth::user()->id;
                    ?>
                        <div class="form-group{{ $errors->has('nama_sekolah') ? ' has-error' : '' }}">
                            <label for="nama_sekolah" class="col-md-4 control-label">Nama Sekolah</label>
                            <div class="col-md-6">
                                <input id="nama_sekolah" type="text" class="form-control" name="nama_sekolah" value="{{ old('nama_sekolah') }}" required>
                                @if ($errors->has('nama_sekolah'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-8 mx-auto">
                    <label for="">Waktu Mulai</label>
                        <input id="waktu_mulai" type="date" class="form-control" name="waktu_mulai" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'admin') readonly @endif>
                         </div>
                         <br>

                  <div class="col-md-8 mx-auto"> 
                    <label for="">Waktu Berakhir</label>
                                <input id="waktu_berakhir" type="date"  class="form-control" name="waktu_berakhir" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(5)->toDateString())) }}" required="" @if(Auth::user()->level == 'admin') readonly @endif>
                        </div>
                        <br>                

                        <div class="form-group{{ $errors->has('nis') ? ' has-error' : '' }}">
                            <label for="nis" class="col-md-4 control-label">NIS</label>
                            <div class="col-md-6">
                                <input id="nis" type="text" class="form-control" name="nis" value="{{ old('nis') }}" required>
                                @if ($errors->has('nis'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nis') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                            <label for="alamat" class="col-md-4 control-label">Alamat</label>
                            <div class="col-md-6">
                                <input id="alamat" type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required>
                                @if ($errors->has('alamat'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                            <label for="deskripsi" class="col-md-4 control-label">Deskripsi</label>
                            <div class="col-md-6">
                                <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi') }}" required>
                                @if ($errors->has('deskripsi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('deskripsi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('kuota') ? ' has-error' : '' }}">
                            <label for="kuota" class="col-md-4 control-label">Kuota</label>
                            <div class="col-md-6">
                                <input id="kuota" type="number" maxlength="4" class="form-control" name="kuota" value="{{ old('kuota') }}" required>
                                @if ($errors->has('kuota'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kuota') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="gambar" class="col-md-4 control-label">Gambar</label>
                            <div class="col-md-6">
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gambar">

                      <br>
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Submit
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('SMK.index')}}" class="btn btn-light pull-right">Back</a>
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