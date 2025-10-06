<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Mengarahkan ke view 'auth.login'
        // Anda perlu membuat file blade/view ini (misalnya: resources/views/auth/login.blade.php)
        return view('login');
    }

    public function login(Request $request)
    {
        // 1. Validasi
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required|min:3|regex:/[A-Z]/', // minimal 3 karakter & mengandung huruf kapital
        ], [
            // Pesan validasi dalam Bahasa Indonesia
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 3 karakter.',
            'password.regex' => 'Password harus mengandung minimal satu huruf kapital.',
        ]);

        // 2. Jika rule tidak sesuai, arahkan kembali ke halaman login dengan pesan
        if ($validator->fails()) {
            return redirect('/auth')
                ->withErrors($validator)
                ->withInput(); // Tetap mengisi form input sebelumnya
        }

        // 3. Logika tambahan: Jika username dan password memiliki value yang sama
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === $password) {
            // Validasi berhasil dan kondisi terpenuhi
            return redirect('/dashboard')->with('success_message', 'Login Berhasil! Username dan Password Anda sama.');
        } else {
            // Validasi berhasil, tapi kondisi username=password tidak terpenuhi
            // Kita anggap ini sebagai kegagalan login karena instruksi berfokus pada kondisi username=password
            // Jika Anda ingin mengarahkan ke dashboard untuk login yang 'berhasil' (meski username != password),
            // ubah baris di bawah ini menjadi redirect('/dashboard')
            return redirect('/auth')
                ->with('error', 'Login Gagal! Meskipun data valid, Username dan Password harus memiliki nilai yang sama.')
                ->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
