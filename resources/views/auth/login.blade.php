<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SIPPL</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('Universitas_Brawijaya.png')}}" />
</head>
 <br>
<!-- <div class="jumbotron jumbotron-fluid text-center"> -->
  <div class="container text-center p-3 mb-2 bg-primary text-white">
    <h3><b>SISTEM INFORMASI PENDAFTARAN PRAKTIK PENGALAMAN LAPANGAN</b></h3>
 
  <!-- </div> -->
</div>



<body>
<form method="POST" action="{{ route('login') }}">
{{ csrf_field() }}
 
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth theme-one">

        <div class="row w-100">
        <div class="col-md-12" style="margin-bottom: 15px; margin-top: -15px;">
        <div class="text-center"><img src="{{asset('logo-filkom-ub.png')}}" alt="">
        </div>

        <h2 style="text-align: center; bg-primary">LOGIN</h2>

        @if (session('status'))
                        <div class="alert alert-success text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('warning'))
                        <div class="alert alert-warning text-center">
                            {{ session('warning') }}
                        </div>
                    @endif
        </div>

        
        <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">

                <div class="form-group">
                  <label class="label">Email or NIM</label>

                  <div class="input-group">
                    <input id="nim" type="text" class="form-control" name="nim" value="{{ old('nim') }}" required autofocus>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
<!--                     @if ($errors->has('nim'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nim') }}</strong>
                        </span>
                    @endif
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif -->
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" required>
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                </div>
                                    @if ($errors->has('email'))
                      <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <br>
                    <br>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit">LOGIN</button>
                </div>
                <br>
        
            <!-- <div class="form-group">
            <a href="{{ url('mhsregister') }}" class="btn btn-primary submit-btn btn-block">Daftar sebagai Mahasiswa</a>
            </div> -->
            <div class="form-group">
            <a href="{{ url('smkmendaftar') }}" class="btn btn-primary submit-btn btn-block">Daftar sebagai SMK</a>
            </div>
            <br>
            <p class="footer-text text-center" style="margin-top: 20px;color: #308ee0">Copyright © {{date('Y')}} SIPPL - All rights reserved.</p>
          </div>
        </div>
  
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  </form>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
  <script src="{{asset('js/sweetalert2.all.js')}}"></script>
  <script src="{{asset('js/select2.min.js')}}"></script>
  @include('sweetalert::alert')
  @section('js')
</body>

</html>