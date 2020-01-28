@extends('layouts.appkaprodi')

@section('content')


<form method="POST" action="{{ url('simpanMhs') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
    <div class="col-md-12 d-flex justify-content-center">
        <div class="row flex-grow justify-content-center align-items-center container"> 
            <div class="card justify-content-center align-items-center container">
                <div class="col-md-8 mt-1 mx-auto text-center bg-primary text-white float-center border border-info"><h4><strong>MEMBUAT AKUN MAHASISWA</strong></div>
                    <div class="card-body justify-content-center align-items-center container">      
                      
                    <div class="col-md-8 mx-auto">
                    <label for="">Nama Lengkap</label>
                          <input id="nama" type="text" class="form-control" name="nama" required>
                         </div>
                            <br>
                         <div class="col-md-8 mx-auto">
                    <label for="">Email</label>
                          <input id="email" type="text" class="form-control" name="email" required>
                         </div>

                         <br>
                         <div class="col-md-8 mx-auto">
                    <label for="">NIM</label>
                          <input id="nim" type="number" class="form-control" name="nim" required>
                         </div>
                         <br>
                         <div class="col-md-8 mx-auto">
                    <label for="">SKS</label>
                          <input id="sks" type="number" class="form-control" name="sks" required>
                         <br>
                          <button type="submit" class="btn btn-primary" id="submit">
                                    Tambahkan
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                  </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>
@endsection