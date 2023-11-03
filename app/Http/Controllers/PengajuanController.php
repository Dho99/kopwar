<?php

namespace App\Http\Controllers;

use App\Models\Angsuran;
use App\Models\Log;
use App\Models\Pengajuan;
use App\Models\Pinjaman;
use App\Models\Simpanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pengajuan.list', [
            'title' => 'Pengajuan',
        ]);
    }

    public function filtered(Request $request)
    {
        $value = $request->jenis;

        switch ($value) {
            case 'Simpanan':
                $query = Pengajuan::where('category', 'Simpanan')
                    ->with('user', 'simpan', 'user')
                    ->latest()
                    ->get();
                return back()->with('simpanan', $query);
                break;
            case 'Pinjaman':
                $query = Pengajuan::where('category', 'Pinjaman')
                    ->with('user', 'user')
                    ->latest()
                    ->get();
                return back()->with('pinjaman', $query);
                break;
            case 'Angsuran':
                $query = Pengajuan::where('category', 'Angsuran')
                    ->with('user', 'user')
                    ->latest()
                    ->get();
                return back()->with('angsuran', $query);
                break;
            case 'Anggota':
                $query = Pengajuan::where('category', 'Anggota')
                    ->with('user')
                    ->latest()
                    ->get();
                return back()->with('user', $query);
                break;
            default:
                return back()->with('message', 'Select tidak boleh Kosong.');
                break;
        }
    }

    public function setuju($id_pengajuan)
    {
        $value = Pengajuan::where('id_pengajuan', $id_pengajuan)->get();
        $data = $value->first()->category;
        // dd($data);
        switch ($data) {
            case 'Simpanan':
                Pengajuan::where('id_pengajuan', $id_pengajuan)->update(['status' => 'Disetujui']);
                $simpan = Pengajuan::where('id_pengajuan', $id_pengajuan)
                    ->latest()
                    ->get();
                foreach ($simpan as $item) {
                    Simpanan::create([
                        'user_id' => $item->user_id,
                        'id_jenis_simpanan' => $item->id_jenis_simpanan,
                        'jumlah' => $item->jumlah,
                        'kode_simpanan' => $item->kode_simpanan,
                        'user_id' => $item->user_id,
                    ]);

                    Log::create([
                        'kode_anggota' => auth()->user()->kode_anggota,
                        'nama_lengkap' => auth()->user()->nama_lengkap,
                        'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                        'aktivitas' => 'Menyetujui Pengajuan ' . $item->simpan['jenis_simpanan'] . ' ' . $item->user->nama_lengkap,
                    ]);
        
                }
                $data = Pengajuan::where('category', 'Simpanan')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data berhasil Disimpan.', 'simpanan' => $data]);
                break;

            case 'Pinjaman':
                Pengajuan::where('id_pengajuan', $id_pengajuan)->update(['status' => 'Disetujui']);
                $pinjam = Pengajuan::where('id_pengajuan', $id_pengajuan)
                    ->latest()
                    ->get();
                foreach ($pinjam as $item) {
                    $data = Pinjaman::create([
                        'kode_pinjaman' => $item->kode_pinjaman,
                        'user_id' => $item->user_id,
                        'jumlah' => $item->jumlah,
                        'rencana_bayar' => $item->rencana_bayar,
                        'keterangan' => $item->keterangan,
                        'user_id' => $item->user_id,
                    ]);

                    Log::create([
                        'kode_anggota' => auth()->user()->kode_anggota,
                        'nama_lengkap' => auth()->user()->nama_lengkap,
                        'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                        'aktivitas' => 'Menyetujui Pengajuan Pinjaman ' . $data['kode_pinjaman'],
                    ]);

                }
                $data = Pengajuan::where('category', 'Pinjaman')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data berhasil Disimpan.', 'pinjaman' => $data]);
                break;

            case 'Angsuran':
                Pengajuan::where('id_pengajuan', $id_pengajuan)->update(['status' => 'Disetujui']);
                $angsur = Pengajuan::where('id_pengajuan', $id_pengajuan)
                    ->latest()
                    ->get();
                foreach ($angsur as $item) {
                    $data = Angsuran::create([
                        'pinjam_id' => $item->pinjam_id,
                        'user_id' => $item->user_id,
                        'user_id' => $item->user_id,
                        'terbayar' => $item->terbayar,
                    ]);
                    Log::create([
                        'kode_anggota' => auth()->user()->kode_anggota,
                        'nama_lengkap' => auth()->user()->nama_lengkap,
                        'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                        'aktivitas' => 'Menyetujui Pengajuan Angsuran ' . $data->pinjam['kode_pinjaman'] . ' Dari ' . $data->user['nama_lengkap'],
                    ]);
                }
                $data = Pengajuan::where('category', 'Angsuran')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data berhasil Disimpan.', 'angsuran' => $data]);
                break;

            default:
                return back()->with('message', 'Persetujuan Terkendala');
                break;
        }
    }

    public function tolak($id_pengajuan)
    {
        $value = Pengajuan::where('id_pengajuan', $id_pengajuan)->get();
        $data = $value->first()->category;
        // dd($data);
        switch ($data) {
            case 'Simpanan':
                $items = Pengajuan::where('id_pengajuan', $id_pengajuan)->get();
                foreach ($items as $item) {
                    Log::create([
                        'kode_anggota' => auth()->user()->kode_anggota,
                        'nama_lengkap' => auth()->user()->nama_lengkap,
                        'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                        'aktivitas' => 'Menolak Pengajuan ' . $item->simpan['jenis_simpanan'] . ' ' . $item->user->nama_lengkap,
                    ]);
                }
                Pengajuan::where('id_pengajuan', $id_pengajuan)->update([
                    'status' => 'Ditolak'
                ]);
                $data = Pengajuan::where('category', 'Simpanan')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data pengajuan berhasil Ditolak.', 'simpanan' => $data]);
                break;

            case 'Pinjaman':
                $data = Pengajuan::where('id_pengajuan', $id_pengajuan)->get();
                foreach ($data as $item) {
                    Log::create([
                        'kode_anggota' => auth()->user()->kode_anggota,
                        'nama_lengkap' => auth()->user()->nama_lengkap,
                        'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                        'aktivitas' => 'Menolak Pengajuan Pinjaman ' . $item->kode_pinjaman . ' ' . $item->user['nama_lengkap'],
                    ]);
                }
                Pengajuan::where('id_pengajuan', $id_pengajuan)->update([
                    'status' => 'Ditolak',
                ]);
                $data = Pengajuan::where('category', 'Pinjaman')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data berhasil Dihapus.', 'pinjaman' => $data]);
                break;

            case 'Angsuran':
                $data = Pengajuan::where('id_pengajuan', $id_pengajuan)->get();
                foreach($data as $item){
                    Log::create([
                        'kode_anggota' => auth()->user()->kode_anggota,
                        'nama_lengkap' => auth()->user()->nama_lengkap,
                        'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                        'aktivitas' => 'Menolak Angsuran untuk Pinjaman '.$item->pinjam['kode_pinjaman'],
                    ]);
                    
                }
                Pengajuan::where('id_pengajuan', $id_pengajuan)->update([
                    'status' => 'Ditolak',
                ]);
                $data = Pengajuan::where('category', 'Angsuran')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data berhasil Dihapus.', 'angsuran' => $data]);
                break;

            default:
                return back()->with('message', 'Persetujuan Terkendala');
                break;
        }
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
    public function afterShowSimpanan()
    {
        $data = Pengajuan::where('category', 'Simpanan')
            ->latest()
            ->get();
        return redirect()
            ->intended('/pengajuan')
            ->with('simpanan', $data);
    }
    public function afterShowPinjaman()
    {
        $data = Pengajuan::where('category', 'Pinjaman')
            ->latest()
            ->get();
        return redirect()
            ->intended('/pengajuan')
            ->with('pinjaman', $data);
    }
    public function afterShowAngsuran()
    {
        $data = Pengajuan::where('category', 'Angsuran')
            ->latest()
            ->get();
        return redirect()
            ->intended('/pengajuan')
            ->with('angsuran', $data);
    }

    public function showSimpanan($id_pengajuan)
    {
        return view('pengajuan.detailSimpanan', [
            'title' => 'Pengajuan',
            'datas' => Pengajuan::where(['id_pengajuan' => $id_pengajuan, 'category' => 'Simpanan'])
                ->with('simpan', 'user', 'user')
                ->latest()
                ->get(),
        ]);
    }

    public function showPinjaman($id_pengajuan)
    {
        return view('pengajuan.detailPinjaman', [
            'title' => 'Pengajuan',
            'datas' => Pengajuan::where(['id_pengajuan' => $id_pengajuan, 'category' => 'Pinjaman'])
                ->with('user', 'user')
                ->latest()
                ->get(),
        ]);
    }

    public function showAngsuran($id_pengajuan)
    {
        return view('pengajuan.detailAngsuran', [
            'title' => 'Pengajuan',
            'datas' => Pengajuan::where(['id_pengajuan' => $id_pengajuan, 'category' => 'Angsuran'])
                ->with('user', 'user')
                ->latest()
                ->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
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
    public function destroy($id_pengajuan)
    {
        $value = Pengajuan::where('id_pengajuan', $id_pengajuan)->get();
        $data = $value->first()->category;
        // dd($data);
        switch ($data) {
            case 'Simpanan':
                Pengajuan::where('id_pengajuan', $id_pengajuan)->delete();
                $data = Pengajuan::where('category', 'Simpanan')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data berhasil Dihapus.', 'simpanan' => $data]);
                break;

            case 'Pinjaman':
                Pengajuan::where('id_pengajuan', $id_pengajuan)->delete();
                $data = Pengajuan::where('category', 'Pinjaman')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data berhasil Dihapus.', 'pinjaman' => $data]);
                break;

            case 'Angsuran':
                Pengajuan::where('id_pengajuan', $id_pengajuan)->delete();
                $data = Pengajuan::where('category', 'Angsuran')
                    ->latest()
                    ->get();
                return back()->with(['success' => 'Data berhasil Dihapus.', 'angsuran' => $data]);
                break;

            default:
                return back()->with('message', 'Persetujuan Terkendala');
                break;
        }
    }
}
