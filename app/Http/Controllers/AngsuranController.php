<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Log;
use Carbon\Carbon;

class AngsuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $angsuran = Angsuran::groupBy('pinjam_id')->sum('terbayar');
        $pinjaman = Pinjaman::groupBy('pinjam_id')->sum('jumlah');
        $data = $angsuran - $pinjaman;
        return view('angsuran.list', [
            'title' => 'Angsuran',
            'list' => Angsuran::with('user')
                ->latest()
                ->get(),
            'notConfirmed' => Pengajuan::where(['status' => 'Pending', 'category' => 'Angsuran'])
                ->with('anggota', 'pinjam', 'user')
                ->get(),
            'hitung' => $data,
        ]);
    }

    public function userIndex($user_id)
    {
        $angsuran = Angsuran::where('user_id', $user_id)
            ->groupBy('pinjam_id')
            ->sum('terbayar');
        $pinjaman = Pinjaman::where('user_id', $user_id)
            ->groupBy('pinjam_id')
            ->sum('jumlah');
        $data = $angsuran - $pinjaman;
        // dd($data);
        return view('user.angsuran.list', [
            'title' => 'Angsuran',
            'list' => Angsuran::where('user_id', $user_id)
                ->with('user')
                ->groupBy('pinjam_id')
                // ->latest()
                ->get(),
            'notConfirmed' => Pengajuan::where(['status' => 'Pending', 'category' => 'Angsuran', 'user_id' => $user_id])
                ->with('pinjam', 'user')
                ->get(),
            'hitung' => $data,
        ]);
    }

    public function filter()
    {
        return view('laporan.filterAngsuran', [
            'title' => 'Laporan Angsuran',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filtered(Request $request)
    {
        if ($request->ajax()) {
            if ($request->from_date && $request->to_date) {
                $start_date = Carbon::parse($request->from_date);
                $end_date = Carbon::parse($request->to_date)->subDays(-1);
                if ($end_date >= $start_date) {
                    $data = Angsuran::with('user', 'pinjam')
                        ->whereBetween('created_at', [$start_date, $end_date])
                        ->get();
                } else {
                    $data = Angsuran::with('user', 'pinjam')
                        ->latest()
                        ->get();
                }
            } else {
                $data = Angsuran::with('user', 'pinjam')
                    ->latest()
                    ->get();
            }

            return response()->json([
                'angsurans' => $data,
            ]);
        } else {
            abort(400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function userFindAngsuran($user_id)
    {
        return view('user.angsuran.find', [
            'title' => 'Angsuran',
            'datas' => Pinjaman::where('user_id', $user_id)
                ->with('user', 'anggota')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('angsuran.find', [
            'title' => 'Angsuran',
            'datas' => Pinjaman::with('user', 'anggota')->get(),
        ]);
    }

    public function find(Request $request)
    {
        $data = Pinjaman::with('user', 'anggota')
            ->where('pinjam_id', $request->pinjam_id)
            ->get();
        return view('angsuran.create', [
            'title' => 'Angsuran',
            'datas' => $data,
        ]);
    }

    public function directAngsuran($pinjam_id)
    {
        $data = Pinjaman::with('user', 'anggota')
            ->where('pinjam_id', $pinjam_id)
            ->get();
        return view('angsuran.create', [
            'title' => 'Angsuran',
            'datas' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->level === 'Pengurus') {
            $data = Angsuran::create([
                'pinjam_id' => $request->pinjam_id,
                'user_id' => $request->user_id,
                'terbayar' => $request->terbayar,
            ]);

            Log::create([
                'kode_anggota' => auth()->user()->kode_anggota,
                'nama_lengkap' => auth()->user()->nama_lengkap,
                'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                'aktivitas' => 'Membuat transaksi Angsuran untuk Pinjaman ' . $data->pinjam['kode_pinjaman'],
            ]);

            return redirect()
                ->intended('/angsuran')
                ->with('success', 'Data berhasil Disimpan');
        } else {
            $data = Pengajuan::create([
                'pinjam_id' => $request->pinjam_id,
                'user_id' => $request->user_id,
                'kode_pinjaman' => $request->kode_pinjaman,
                'terbayar' => $request->terbayar,
                'category' => 'Angsuran',
            ]);

            Log::create([
                'kode_anggota' => auth()->user()->kode_anggota,
                'nama_lengkap' => auth()->user()->nama_lengkap,
                'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                'aktivitas' => 'Membuat Prngajuan Angsuran untuk Pinjaman ' . $data->pinjam['kode_pinjaman'],
            ]);


            return redirect()
                ->intended('/user/angsuran/' . auth()->user()->user_id)
                ->with('success', 'Data berhasil Disimpan, Tunggu Konfirmasi dari Pengurus.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('angsuran.view', [
            'title' => 'Angsuran',
            'datas' => Angsuran::where('id', $id)
                ->with('user', 'pinjam')
                ->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function invoice($id)
    {
        return view('invoice.angsuran', [
            'title' => 'Invoice',
            'datas' => Angsuran::where('id', $id)
                ->with('user', 'pinjam')
                ->get(),
        ]);
    }

    public function edit(Angsuran $angsuran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Angsuran $angsuran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Angsuran::where('id', $id)->delete();
        return redirect()
            ->intended('/angsuran')
            ->with('success', 'Data berhasil Dihapus');
    }
}
