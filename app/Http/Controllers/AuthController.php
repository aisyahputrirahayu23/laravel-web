<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        // 1. Validasi
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors([
                    'email' => 'Email tidak ditemukan.',
                ]);
        }

        // Cek password dengan Hash::check
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors([
                    'password' => 'Password yang dimasukkan salah.',
                ]);
        }

        // Login user
        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Login berhasil!');
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

    public function logout()
    {
        User::logout();
        return redirect()->route('login')->with('info', 'Anda telah logout.');
    }
}
