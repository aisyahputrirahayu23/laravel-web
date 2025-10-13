<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang!</h1>
    @isset($message)
        <p style="color: green; font-weight: bold;">{{ $message }}</p>
    @endisset

    <p>Ini adalah halaman baru setelah proses login yang sukses.</p>
    <a href="/auth">Kembali ke Login</a>
</body>
</html>