<!DOCTYPE html>
<html lang="en">
<head>
    <title>Selamat Datang</title>
</head>
<body>
    <h2>Selamat Datang {{$user['nama']}}</h2>
    Anda telah ditambahkan ke list Mahasiswa PPL melalui email = {{$user['email']}} dan Password = password , Klik link di bawah ini untuk verifikasi akun anda 
    <br/>
    <a href="{{url('user/Activation', $user->token)}}">Verify Email</a>
    </body>
</body>
</html>