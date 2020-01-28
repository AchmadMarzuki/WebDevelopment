@extends('layouts.appkaprodi')

@section('content')
@if(Auth::user()->level == 'Kaprodi')
<div class="row">
  <div class="col-lg-2">
    <a href="{{ url('/tambahdosbing') }}" class="btn btn-primary btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Dosen Pembimbing PPL</a>
  </div>
 
    <div class="col-lg-12">
                  </div>  
</div>


<div class="row" style="margin-top: 5px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h3 class="card-title"><h3><center>List Dosen Pembimbing PPL</h3></center></h3>
                  
                  <div class="table-responsive">
                    <table class="table table-striped  table-bordered text-center" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nama
                          </th>
                          <th>
                            NIP
                          </th>
                          <th>
                            Ahli Bidang
                          </th>
 
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
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

  
                          <td>
                           <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{route('dosbing.edit', $data->id)}}"> Edit </a>
                            <form action="{{ route('dosbing.destroy', $data->id) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>


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
  @endif



          @if(Auth::user()->level == 'user')

          @section('content')
<div class="row">
 
 
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
                  
</div>


<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h1 class="card-title text-center">Data Dosen Pembimbing PPL</h1>
                  
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered text-center" id="table">
                      <thead>
                        <tr>
                          <th>
                            Nama Dosen
                          </th>
                          <th>
                            NIP
                          </th>
                          <th>
                            Bidang Ahli
                          </th>
 
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                        <td>
                            {{$data->nama_dosen}}
                        </td>

                        <td>
                          {{$data->nip}}
                        </td>
                        <td>
                          {{$data->ahli_bidang}}
                        </td>
 
                        <a href="{{route('dosbing.edit', $data->id)}}" class="btn btn-success btn-sm">  Masukkan Data PPL </a>
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
  
  @endif