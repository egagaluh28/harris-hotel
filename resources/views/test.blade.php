<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Blade Template</title>
</head>
<body>
    <h1>Informasi Pengguna</h1>
    <div>
        <h2>Data Pengguna</h2>
        <ul>
            @foreach($users as $user)
                <li>
                    Nama Pengguna: {{ $user->nama_pengguna }} <br>
                    Email: {{ $user->email }} <br>
                    Hak Akses: {{ $user->hakAkses->nama_hak_akses }}
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
