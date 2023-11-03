<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  
    // Authentication
    public function login()
    {
        if (Auth::check()) {
            return redirect()->intended('/dashboard')->with('greet', 'Selamat Datang Kembali, '.auth()->user()->nama_lengkap);
        } else {
            return view('login.index', [
                'title' => 'Login',
            ]);
        }
    }

    public function authenticate(Request $request)
    {
        $request->flashOnly(['username']);
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            if(auth()->user()->status == 'Aktif'){
                if(auth()->user()->level == 'Pengurus'){
                    $request->session()->regenerate();
                    return redirect()
                        ->intended('/dashboard')
                        ->with('greet', 'Selamat Datang ' . auth()->user()->nama_lengkap);
                }elseif(auth()->user()->level == 'Anggota'){
                    $request->session()->regenerate();

                    return redirect()
                        ->intended('/user/dashboard')
                        ->with('greet', 'Selamat Datang ' . auth()->user()->nama_lengkap);
                }else{
                    return back()->with('username','Mohon coba lagi');
                }
            }else{
                return back()->with('username', 'Akun anda sudah dinonaktifkan');
            }
        } else {
            return back()->with('username', 'Mohon Masukkan Data dengan Benar');
        }
    }

    public function logout(Request $request)
    {
        // $log = new Log();
        // $log->user_id = auth()->user()->user_id;
        // $log->aktivitas = 'Logout';
        // $log->save();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Resourceful methods
    public function index()
    {
        // Implementasi untuk menampilkan daftar data
    }

    public function create()
    {
        // Implementasi untuk menampilkan formulir pembuatan data baru
    }

    public function store(Request $request)
    {
        // Implementasi untuk menyimpan data baru yang dikirim melalui formulir
    }

    public function show($user)
    {
        // Implementasi untuk menampilkan data spesifik
    }

    public function edit($user)
    {
        // Implementasi untuk menampilkan formulir pengeditan data
    }

    public function update(Request $request, $user)
    {
        // Implementasi untuk memperbarui data yang dikirim melalui formulir pengeditan
    }

    public function destroy($user)
    {
        // Implementasi untuk menghapus data
    }
}
