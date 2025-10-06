<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Halaman Login</title>
</head>
<body>
    <h1>Login Aplikasi</h1>

    {{-- Tampilkan Pesan Error Validasi (jika ada) --}}
    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tampilkan Pesan Error Umum (jika ada) --}}
    @if (session('error'))
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="login">
        {{-- Ini adalah directive untuk keamanan di Laravel --}}
        @csrf

        <div>
            <label for="username">Username:</label>
            {{-- Menggunakan old() untuk mempertahankan input lama --}}
            <input type="text" id="username" name="username" value="{{ old('username') }}" required>
        </div>
        <br>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
