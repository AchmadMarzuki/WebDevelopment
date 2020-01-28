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
@foreach($datas as $data)
<form action="{{ route('SMK.posting', $data->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
<div class="col-md-12 d-flex justify-content-center">
        <div class="row flex-grow justify-content-center align-items-center container"> 
            <div class="card justify-content-center align-items-center container">
            <br>
                <div class="col-md-8 mt-1 mx-auto text-center bg-primary text-white float-center border border-info"><h4><strong><b>{{$data->nama_sekolah}}</b> MELAKUKAN POSTING</strong></div>
                    <div class="card-body justify-content-center align-items-center container">  
 
                    <div class="col-md-8 mx-auto">
                    <label for="">Nama Sekolah</label>
                          <input id="nama_sekolah" type="text" class="form-control" name="nama_sekolah" value="{{$data->nama_sekolah}}" required>
                         </div>
                        <br>

                    <div class="col-md-8 mx-auto">
                    <label for="">Alamat</label>
                          <input id="alamat" type="text" class="form-control" name="alamat" value="{{$data->alamat}}" required>
                         </div>
                        <br>

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


                    <div class="col-md-8 mx-auto">
                    <label for="">Keterangan</label>
                          <input id="deskripsi" type="text" class="form-control" name="deskripsi" value="{{$data->deskripsi}}" required>
                         </div>
                        <br>

                    <div class="col-md-8 mx-auto">
                    <label for="">Kuota</label>
                          <input id="kuota" type="number" class="form-control" name="kuota" value="{{$data->kuota}}" required>
                        <br>
                        <br>
                        
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Posting
                        </button>
                        <a href="{{ url('/updateSMK') }}" class="btn btn-light pull-right">Back</a>
                        @endforeach
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                   </div>
                </div>
           </div>
        </div>
    </div>

</div>
</form>

@endsection