<?php

namespace App\Http\Controllers;

use App\Models\Pinjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tambah()
    {
        return view('admin.pinjaman.tambah-pinjaman', [
            'title' => 'Data Pinjaman',
            'users' => User::all(),
            'jenis' => Pinjaman::join('tbl_anggota', 'tbl_anggota.anggota_id', '=', 'tbl_pinjaman.anggota_id')->get('*'),
        ]);
    }

    public function index()
    {
        return view('admin.pinjaman.pinjaman', [
            'title' => 'Data Pinjaman',
            'total' => Pinjaman::count(),
            'jenis' => Pinjaman::join('tbl_anggota', 'tbl_anggota.anggota_id', '=', 'tbl_pinjaman.anggota_id')->get('*'),
        ]);
    }

    public function info($kode_pinjaman){
        return view('admin.pinjaman.info-pinjaman', [
            'title' => 'Data Pinjaman',
            'datas' => Pinjaman::join('tbl_anggota', 'tbl_anggota.anggota_id', '=', 'tbl_pinjaman.anggota_id')->get('*')->where('anggota_id')
        ]);
    }

    public function index_user(){
        return view('user.pinjaman.index', [
            'title' => 'Pinjaman',
            'pinjam' => Pinjaman::where('anggota_id', auth()->user()->anggota_id)->sum('jumlah_pinjaman'),
            'riwayat' => Pinjaman::all()->where('anggota_id', auth()->user()->anggota_id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $time = Carbon::now()->toDateTimeString();

        $save = Pinjaman::create([
            'anggota_id' => $request->user_id,
            'jumlah_pinjaman' => $request->jumlah,
            'kode_pinjaman' => 'PIN-'.mt_rand(100,999999),
            'jumlah_bayar' => '0',
            'periode' => $request->periode,
            'timestamp' => $time, 
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->intended('/admin/pinjaman/invoice')->with(['data' => $save]);
        // return redirect()->intended('/admin/data/anggota');
    }

    public function invoice() {
        return view('admin.invoice.invoice', [
            'title' => 'Invoice',
            'items' => User::where('anggota_id' ,  session('data')->anggota_id)->get(),
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pinjaman $pinjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pinjaman $pinjaman)
    {
        //
    }
}
