<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $input = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($input)) {
            $request->session()->regenerate();
            // cek Role User yang sedang login
            // if (auth()->user()->hasRole('admin')) {
            //     return redirect()->intended('/admin/dashboard');
            //     //Arahkan ke halaman admin
            // }
                // Jika bukan admin
                return redirect()->intended('/dashboard'); //Arahkan ke User Biasa
            }

            // Jika login gagal
            return back()->withErrors([
                'email' => 'Email atau Password salah.',
            ]);

            // // 1. Validasi
            // $request->validate([
            //     'email' => 'required|email',
            //     'password' => 'required|min:8'
            // ]);

            // $user = User::where('email', $request->email)->first();

            // if (!$user) {
            //     return redirect()->back()->withErrors([
            //             'email' => 'Email tidak ditemukan.',
            //         ]);
            // }

            // // Cek password dengan Hash::check
            // if (!Hash::check($request->password, $user->password)) {
            //     return redirect()->back()->withErrors([
            //             'password' => 'Password yang dimasukkan salah.',
            //         ]);
            // }

            // // Login user
            // Auth::login($user);

            // return redirect()->route('dashboard')->with('success', 'Login berhasil!');
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

        // Proses logout
        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/');
        }
    }
