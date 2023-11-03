<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Log;
use App\Models\Pengajuan;
use App\Models\Pinjaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pinjaman.list', [
            'list' => Pinjaman::with('user', 'anggota')
                ->latest()
                ->get(),
            'notConfirmed' => Pengajuan::with('user', 'pinjam', 'anggota')
                ->where(['status' => 'Pending', 'category' => 'Pinjaman'])
                ->get(),
            'title' => 'Pinjaman',
        ]);
    }

    public function userIndex($user_id)
    {
        return view('user.pinjaman.list', [
            'list' => Pinjaman::where('user_id', $user_id)
                ->with('user')
                ->latest()
                ->get(),
            'notConfirmed' => Pengajuan::where('user_id', $user_id)
                ->with('user', 'pinjam')
                ->where(['status' => 'Pending', 'category' => 'Pinjaman'])
                ->get(),
            'title' => 'Pinjaman',
        ]);
    }

    public function generate()
    {
        $number = 'PIN-' . mt_rand(100000, 999999);
        return back()->with('uniqueCode', $number);
    }

    public function filter()
    {
        return view('laporan.filterPinjaman', [
            'title' => 'Laporan Pinjaman',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function filtered(Request $request)
    {
        if ($request->ajax()) {
            if ($request->from_date && $request->to_date) {
                $start_date = Carbon::parse($request->from_date)->subDays(-1);
                $end_date = Carbon::parse($request->to_date)->subDays(-1);
                if ($end_date >= $start_date) {
                    $data = Pinjaman::with('user')
                        ->whereBetween('created_at', [$start_date, $end_date])
                        ->get();
                } else {
                    $data = Pinjaman::with('user')
                        ->latest()
                        ->get();
                }
            } else {
                $data = Pinjaman::with('user')
                    ->latest()
                    ->get();
            }

            return response()->json([
                'pinjamans' => $data,
            ]);
        } else {
            abort(400);
        }
    }

    public function create()
    {
        return view('pinjaman.new', [
            'title' => 'Pinjaman',
            'users' => User::all(),
        ]);
    }

    public function userCreatePinjaman($user_id)
    {
        return view('user.pinjaman.new', [
            'title' => 'Pinjaman',
            'users' => User::where('user_id', $user_id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->level === 'Pengurus') {
            $data = Pinjaman::create([
                'kode_pinjaman' => $request->kode_pinjaman,
                'user_id' => $request->user_id,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                'rencana_bayar' => $request->rencana,
            ]);

            Log::create([
                'kode_anggota' => auth()->user()->kode_anggota,
                'nama_lengkap' => auth()->user()->nama_lengkap,
                'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                'aktivitas' => 'Membuat transaksi Pinjaman ' . $data['kode_pinjaman'],
            ]);

            return redirect()
                ->intended('/pinjaman')
                ->with('success', 'Data berhasil disimpan');
        } else {
            $data = Pengajuan::create([
                'kode_pinjaman' => $request->kode_pinjaman,
                'user_id' => $request->user_id,
                'jumlah' => $request->jumlah,
                'keterangan' => $request->keterangan,
                'rencana_bayar' => $request->rencana,
                'category' => $request->category,
            ]);

            Log::create([
                'kode_anggota' => auth()->user()->kode_anggota,
                'nama_lengkap' => auth()->user()->nama_lengkap,
                'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                'aktivitas' => 'Menambah data Pengajuan Pinjaman ' . $data['kode_pinjaman'],
            ]);


            return redirect()
                ->intended('/user/pinjaman/'.auth()->user()->user_id)
                ->with('success', 'Data berhasil disimpan, Tunggu Keputusan Pengurus');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjaman $pinjaman, $pinjam_id)
    {
        return view('pinjaman.edit', [
            'title' => 'Pinjaman',
            'datas' => Pinjaman::where('pinjam_id', $pinjam_id)
                ->with('user')
                ->get(),
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function view($pinjam_id)
    {
        return view('pinjaman.view', [
            'title' => 'Pinjaman',
            'datas' => Pinjaman::where('pinjam_id', $pinjam_id)
                ->with('user')
                ->get(),
        ]);
    }

    public function invoice($pinjam_id)
    {
        return view('invoice.pinjaman', [
            'title' => 'Invoice',
            'datas' => Pinjaman::where('pinjam_id', $pinjam_id)
                ->with('user', 'anggota')
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $pinjam_id)
    {
        $data = Pinjaman::where('pinjam_id', $pinjam_id)->update([
            'kode_pinjaman' => $request->kode_pinjaman,
            'user_id' => $request->user_id,
            'jumlah' => $request->jumlah,
            'rencana_bayar' => $request->rencana,
            'keterangan' => $request->keterangan,
        ]);

        Log::create([
            'kode_anggota' => auth()->user()->kode_anggota,
            'nama_lengkap' => auth()->user()->nama_lengkap,
            'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
            'aktivitas' => 'Memperbarui data Pinjaman ' . $data['kode_pinjaman'],
        ]);

        return redirect()
            ->intended('/pinjaman')
            ->with('success', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pinjam_id)
    {
        $data = Pinjaman::where('pinjam_id', $pinjam_id)->get();
        foreach ($data as $item) {

            Log::create([
                'kode_anggota' => auth()->user()->kode_anggota,
                'nama_lengkap' => auth()->user()->nama_lengkap,
                'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                'aktivitas' => 'Menghapus data Pinjaman ' . $item->kode_pinjaman,
            ]);
        }
        Pinjaman::where('pinjam_id', $pinjam_id)->delete();
        return redirect()
            ->intended('/pinjaman')
            ->with('success', 'Data berhasil Dihapus');
    }
}
