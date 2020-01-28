<!DOCTYPE html>
  <html>
  <head>
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2><center>Mahasiswa telah Melakukan Pendaftaran PPL</center></h2>

<table>
  <tr>
  <th>Status</th>
    <th>Kode Daftar</th>
    <th>Nama Mahasiswa</th>
    <th>Nim</th>
    <th>Nama Sekolah</th>
  </tr>
  @foreach($PendaftaranPPL as $data)
  <tr>

  <td>
  <b>
                        <?php
                        for ($i=0; $i < $jumlahdata; $i++) { 
                          if ($kode_daftar[$i] == $data->kode_daftar) {
                            if ($jumlah[$i] > 1) {
                              echo "TIM";
                            }else{
                              echo "INDIVIDU";
                            }
                          }
                        }
                        ?>
                        </b>
                        </td>
  <td>{{$data->kode_daftar}}</td>
    <td>{{$data->nama}}</td>
  <td>{{$data->nim}}</td>
  <td>{{$data->nama_sekolah}}</td>
  </tr>
  @endforeach

</table>

</body>
</html>
