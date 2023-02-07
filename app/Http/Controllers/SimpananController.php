<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\jenisSimpanan;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.simpanan.simpanan', [
            'title' => 'Form Simpanan',
            'users' => User::all(),
            'items' => jenisSimpanan::all()
        ]);
    }

    public function record(){
        $items = Simpanan::join('tbl_anggota', 'tbl_anggota.anggota_id', '=', 'tbl_simpanan.id_anggota')->join('tbl_jenis_simpanan', 'tbl_jenis_simpanan.id_jenis', '=', 'tbl_simpanan.id_jenis_simpanan')->paginate(30);
        // $items = Simpanan::paginate(20);
        return view('admin.simpanan.record', [
            'title' => 'Data Simpanan',
            'items' => $items
        ]);
    }

    public function index_user() {
        return view('user.simpanan.index', [
            'title' => 'Simpanan',
            'total_simwa' => Simpanan::where('id_anggota', auth()->user()->id_anggota)->orWhere('id_jenis_simpanan', 2)->sum('jumlah'),
            'total_simpok' => Simpanan::where('id_anggota', auth()->user()->id_anggota)->orWhere('id_jenis_simpanan', 1)->sum('jumlah'),
            'total_shr' => Simpanan::where('id_anggota', auth()->user()->id_anggota)->orWhere('id_jenis_simpanan', 3)->sum('jumlah'),
            'total_wisata' => Simpanan::where('id_anggota', auth()->user()->id_anggota)->orWhere('id_jenis_simpanan', 5)->sum('jumlah'),
            'total_umroh' => Simpanan::where('id_anggota', auth()->user()->id_anggota)->orWhere('id_jenis_simpanan', 4)->sum('jumlah'),
            'riwayat' => Simpanan::all()->where('id_anggota', auth()->user()->id_anggota)
        ]);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Simpanan::create([
            'id_anggota' => $request->id_user,
            'id_jenis_simpanan' => $request->jenis,
            'jumlah' => $request->jumlah,
            'periode' => $request->periode
        ]);

        return redirect()->intended('/admin/data/simpanan');
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
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Simpanan $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Simpanan $simpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simpanan $simpanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simpanan $simpanan)
    {
        //
    }
}
