<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Pinjaman;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_user() {

        $angsuran = Angsuran::where('anggota_id', auth()->user()->anggota_id)->sum('jumlah_angsur');
        $bayar = Pinjaman::where('anggota_id', auth()->user()->anggota_id)->sum('jumlah_bayar');
        return view('user.angsuran.index', [
            'title' => 'Angsuran',
            'jumlah' => $bayar - $angsuran,
            'riwayat' => Angsuran::where('anggota_id', auth()->user()->anggota_id)->groupBy('angsuran_id')->get(),
            'bayar' => $bayar
        ]);
    }




    public function index(Request $request)
    {
        return view('admin.angsuran.angsuran', [
            'title' => 'Form Angsuran',
            'users' => User::all(),
            'pinjamans' => Pinjaman::where('anggota_id', $request->anggota_id)
        ]);
    }

    public function list()
    {
        $items = Angsuran::join('tbl_anggota', 'tbl_anggota.anggota_id', '=', 'tbl_angsuran.anggota_id')->join('tbl_pinjaman', 'tbl_pinjaman.kode_pinjaman', '=', 'tbl_angsuran.kode_pinjaman')->orderBy('tbl_angsuran.kode_pinjaman')->paginate(30); 
        return view('admin.angsuran.list', [
            'title' => 'Data Angsuran',
            'items' => $items
        ]);
    }

    public function getData(Request $request){
        $find = $request->input('kode_pinjaman');
        $data = Pinjaman::where('kode_pinjaman', 'LIKE', '%' . $find .'%' )->join('tbl_anggota', 'tbl_anggota.anggota_id', '=', 'tbl_pinjaman.anggota_id')->get('*');
        // dd($data);
        return view('admin.angsuran.search',compact('data'), [
            'title' => 'Hasil Search',
            'data' => $data
        ])->with('message', 'Maaf Data yang anda cari Kosong');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function create(Request $request)
    {
        $angsur = Angsuran::create([
            'anggota_id' => $request->id_user,
            'kode_pinjaman' => $request->kode_pinjaman,
            'jumlah_angsur' => $request->jumlah,
            'rencana_bayar' => $request->rencana,
        ]);

        return redirect()->intended('/admin/data/angsuran');
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
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $kode_pinjaman)
    {
        return view('admin.transaksi.bayar', [
            'title' => 'Bayar Angsuran',
            'data' => Pinjaman::where('kode_pinjaman', $kode_pinjaman)->join('tbl_anggota', 'tbl_anggota.anggota_id', '=', 'tbl_pinjaman.anggota_id')->get('*')
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function edit(Angsuran $angsuran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Angsuran $angsuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Angsuran  $angsuran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Angsuran $angsuran)
    {
        //
    }
}
