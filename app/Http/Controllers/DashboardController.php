<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Angsuran;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{   
    // Pengurus
    public function index(){
        $angsuran = Angsuran::sum('terbayar');
        $pinjaman = Pinjaman::sum('jumlah');
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'users' => User::where('level', 'Anggota')->get(),
            'totalSimpanan' => Simpanan::sum('jumlah'),
            'totalPinjaman' => $pinjaman,
            'totalAngsuran' => $pinjaman - $angsuran,
        ]);
    }



    // Anggota
    public function userIndex(){
        $angsuran = Angsuran::where('user_id', auth()->user()->user_id)->sum('terbayar');
        $pinjaman = Pinjaman::where('user_id', auth()->user()->user_id)->sum('jumlah');
        return view('user.dashboard.index', [
            'title' => 'Dashboard',
            // 'users' => Anggota::all(),
            'totalSimpanan' => Simpanan::where('user_id', auth()->user()->user_id)->sum('jumlah'),
            'totalPinjaman' => $pinjaman,
            'totalAngsuran' => $pinjaman - $angsuran,
        ]);
    }
}
