@section('js')
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


var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
    </script>
@stop

@extends('layouts.appmhs')

@section('content')
 
<form method="POST" action="{{ url('simpansmk') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
<div class="col-md-12 d-flex justify-content-center">
        <div class="row flex-grow justify-content-center align-items-center container"> 
            <div class="card justify-content-center align-items-center container">
                <div class="col-md-8 mt-1 mx-auto text-center bg-primary text-white float-center border border-info"><h4><strong>SMK MEMBUAT AKUN</strong></div>
                    <div class="card-body justify-content-center align-items-center container">      
                      
                    <div class="col-md-8 mx-auto">
                    <label for="">Nama Sekolah</label>
                          <input id="nama_sekolah" type="text" class="form-control" name="nama_sekolah" required>
                         </div>
                        <br>

                         <div class="col-md-8 mx-auto">
                    <label for="">Email</label>
                          <input id="email" type="text" class="form-control" name="email" required>
                         </div>
                         <br>

                       <div class="col-md-8 mx-auto">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" onkeyup='check();' name="password" required>
                         </div>
                         <br>

                        <div class="col-md-8 mx-auto">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="confirm_password" type="password" onkeyup="check()" class="form-control" name="password_confirmation" required>
                                <span id='message'></span>
                                <br>

                     <button type="submit" class="btn btn-primary" id="submit">
                                    Mendaftar
                    </button>

                    <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>

                        <a href="{{url('home')}}" class="btn btn-light pull-right">LOGIN</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection