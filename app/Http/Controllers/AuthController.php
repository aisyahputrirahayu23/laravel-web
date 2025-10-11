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
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3|regex:/[A-Z]/', 
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 3 karakter.',
            'password.regex' => 'Password harus mengandung minimal satu huruf kapital.',
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        $user = 'Ais';
        $pass = 'Ais123';

        if ($username == $user && $password == $pass) {
            return redirect('/dashboard')->with('success_message', 'Login berhasil! Selamat datang, ' . $username . '.');
        } else {
            return redirect('/auth')->with('error_message', 'Login gagal! Periksa username dan password Anda.');
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
