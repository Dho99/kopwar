<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Simpanan;
use App\Models\Angsuran;
use App\Models\Pinjaman;

class DashboardController extends Controller
{
    
    public function index() {
        $pinjam = Pinjaman::sum('jumlah_pinjaman');
        $bayar = Pinjaman::sum('jumlah_bayar');

        return view('admin.dashboard.index', [
            'title' => 'Dashboard',
            'users' => User::all(),
            'simpanans' => Simpanan::sum('jumlah'),
            'angsurans' => $pinjam - $bayar,
            'pinjamans' => $pinjam > $bayar
        ]);
    }

    public function index_user() {
        $bayar = Pinjaman::where('anggota_id', auth()->user()->anggota_id)->sum('jumlah_bayar');
        $pinjam = Pinjaman::where('anggota_id', auth()->user()->anggota_id)->sum('jumlah_pinjaman');
        return view('user.dashboard.index', [
            'title' => 'Dashboard',
            'pinjaman' => Pinjaman::where('anggota_id', auth()->user()->anggota_id)->sum('jumlah_pinjaman'),
            'simpanan' => Simpanan::where('id_anggota', auth()->user()->anggota_id)->sum('jumlah'),
            'angsurans' => $pinjam - $bayar
        ]);
    }
}
