<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\JenisSimpanan;
use App\Models\Log;
use App\Models\Pengajuan;
use App\Models\Simpanan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = JenisSimpanan::all();
        $simpanans = [];
        foreach($categories as $item){
            $simpanans[] = [
                'categoryName' => $item->jenis_simpanan,
                'jumlah' => Simpanan::where('id_jenis_simpanan', $item->id_jenis_simpanan)->sum('jumlah')
            ];
        }
        return view('simpanan.list', [
            'title' => 'Simpanan',
            'categories' => $simpanans,
            'list' => Simpanan::with('user', 'category')
                ->latest()
                ->get(),
            'notConfirmed' => Pengajuan::where(['status' => 'Pending', 'category' => 'Simpanan'])
                ->with('simpan', 'simpan', 'anggota')
                ->get(),
        ]);
    }

    public function userIndex($id)
    {
        $categories = JenisSimpanan::all();
        $datas = [];
        foreach($categories as $item){
            $datas[] = [
                'categoryName' => $item->jenis_simpanan,
                'jumlah' => Simpanan::where([
                    'id_jenis_simpanan' => $item->id_jenis_simpanan,
                    'user_id' => $id
                ])->sum('jumlah')
                ];
        }

        return view('user.simpanan.list', [
            'title' => 'Simpanan',
            'categories' => $datas,
            'list' => Simpanan::where('user_id', $id)
                ->with('user', 'category')
                ->latest()
                ->get(),
            'notConfirmed' => Pengajuan::where(['status' => 'Pending', 'category' => 'Simpanan', 'user_id' => $id])
                ->with('simpan', 'simpan', 'anggota')
                ->get(),
        ]);
    }

    public function filter()
    {
        return view('laporan.filterSimpanan', [
            'title' => 'Laporan Simpanan',
        ]);
    }

    public function categoryList()
    {
        return view('simpanan.category', [
            'title' => 'Kategori Simpanan',
            'datas' => JenisSimpanan::all(),
        ]);
    }

    public function newCategory()
    {
        return view('simpanan.newCategory', [
            'title' => 'Kategori Simpanan',
        ]);
    }

    public function viewCategory()
    {
        return view('simpanan.viewCategory', [
            'title' => 'Kategori Simpanan',
        ]);
    }

    public function filtered(Request $request)
    {
        if ($request->ajax()) {
            if ($request->from_date && $request->to_date) {
                $start_date = Carbon::parse($request->from_date);
                $end_date = Carbon::parse($request->to_date)->subDays(-1);
                if ($end_date >= $start_date) {
                    $data = Simpanan::with('user', 'category')
                        ->whereBetween('created_at', [$start_date, $end_date])
                        ->get();
                } else {
                    $data = Simpanan::with('user', 'category')
                        ->latest()
                        ->get();
                }
            } else {
                $data = Simpanan::with('user', 'category')
                    ->latest()
                    ->get();
            }

            return response()->json([
                'simpanans' => $data,
            ]);
        } else {
            abort(400);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('simpanan.create', [
            'title' => 'Simpanan',
            'users' => User::all(),
            'category' => JenisSimpanan::all(),
        ]);
    }

    public function userCreateSimpanan($id)
    {
        return view('user.simpanan.create', [
            'title' => 'Simpanan',
            'users' => User::where('user_id', $id)->get(),
            'category' => JenisSimpanan::all(),
        ]);
    }

    public function createCategory(Request $request)
    {
        JenisSimpanan::create([
            'jenis_simpanan' => $request->jenis_simpanan,
        ]);

        Log::create([
            'kode_anggota' => auth()->user()->kode_anggota,
            'nama_lengkap' => auth()->user()->nama_lengkap,
            'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
            'aktivitas' => 'Menambah data Jenis Simpanan',
        ]);

        return redirect('/categorySimpanan')->with('success', 'Data Berhasil Disimpan!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->level === 'Pengurus') {
            $ctrgsm = JenisSimpanan::where('id_jenis_simpanan', $request->id_jenis_simpanan)->first();
                if(isset($ctrgsm)){
                    $ctgrsmid = $ctrgsm->id_jenis_simpanan;
                    $dsc = $ctrgsm->jenis_simpanan;
                }else{
                    $nctrgsm = JenisSimpanan::create([
                        'jenis_simpanan' => $request->id_jenis_simpanan
                    ]);
                    $ctgrsmid = $nctrgsm->id_jenis_simpanan;
                    $dsc = $nctrgsm->jenis_simpanan;
                }
                $data = Simpanan::create([
                    'user_id' => $request->user_id,
                    'id_jenis_simpanan' => $ctgrsmid,
                    'jumlah' => $request->jumlah,
                    'kode_simpanan' => 'SIMP-'.mt_rand(100000, 999999),
                ]);

            // $items = JenisSimpanan::where('id_jenis_simpanan', $data['id_jenis_simpanan'])->get();
            // foreach ($items as $item) {
                Log::create([
                    'kode_anggota' => auth()->user()->kode_anggota,
                    'nama_lengkap' => auth()->user()->nama_lengkap,
                    'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                    'aktivitas' => 'Membuat Transaksi ' . $dsc,
                ]);

            return redirect()
                ->intended('/simpanan')
                ->with('success', 'Data berhasil disimpan');
        } else {
            $data = Pengajuan::create([
                'user_id' => $request->user_id,
                'id_jenis_simpanan' => $request->id_jenis_simpanan,
                'jumlah' => $request->jumlah,
                'category' => $request->category,
                'kode_simpanan' => 'SIMP-'.mt_rand(100000, 999999),
            ]);

            $items = JenisSimpanan::where('id_jenis_simpanan', $data['id_jenis_simpanan'])->get();
            foreach ($items as $item) {

                Log::create([
                    'kode_anggota' => auth()->user()->kode_anggota,
                    'nama_lengkap' => auth()->user()->nama_lengkap,
                    'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                    'aktivitas' => 'Membuat Transaksi ' . $item->jenis_simpanan,
                ]);

            }
            return redirect()
                ->intended('/user/simpanan/'.$data['user_id'])
                ->with('success', 'Data berhasil disimpan, Tunggu Keputusan Pengurus');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('simpanan.show', [
            'title' => 'Simpanan',
            'datas' => Simpanan::where('id', $id)
                ->with('user', 'category')
                ->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('simpanan.edit', [
            'title' => 'Simpanan',
            'datas' => Simpanan::with('user', 'category')
                ->where('id', $id)
                ->get(),
            'users' => User::all(),
            'category' => JenisSimpanan::all(),
        ]);
    }

    public function invoice($id)
    {
        return view('invoice.simpanan', [
            'title' => 'Simpanan',
            'datas' => Simpanan::where('id', $id)
                ->with('category', 'anggota')
                ->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Simpanan::where('id', $id)->update([
            'user_id' => $request->user_id,
            'id_jenis_simpanan' => $request->id_jenis_simpanan,
            'jumlah' => $request->jumlah,
            'periode' => $request->periode,
        ]);

        Log::create([
            'kode_anggota' => auth()->user()->kode_anggota,
            'nama_lengkap' => auth()->user()->nama_lengkap,
            'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
            'aktivitas' => 'Memperbarui data Simpanan ' . $id,
        ]);

        return redirect()
            ->intended('/simpanan')
            ->with('success', 'Data berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Simpanan::where('id', $id)->delete();
        Log::create([
            'kode_anggota' => auth()->user()->kode_anggota,
            'nama_lengkap' => auth()->user()->nama_lengkap,
            'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
            'aktivitas' => 'Menghapus data Simpanan ' . $id,
        ]);
        return redirect()
            ->intended('/simpanan')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function destroyCategory($id_jenis_simpanan)
    {
        $data = JenisSimpanan::where('id_jenis_simpanan', $id_jenis_simpanan)->get();
        foreach ($data as $item) {
            Log::create([
                'kode_anggota' => auth()->user()->kode_anggota,
                'nama_lengkap' => auth()->user()->nama_lengkap,
                'aktivitas' => 'Menghapus Jenis Simpanan ' . $data->jenis_simpanan,
                'aktivitas' => 'Menghapus data Simpanan ' . $id,
            ]);
        }
        JenisSimpanan::where('id_jenis_simpanan', $id_jenis_simpanan)->delete();
        return redirect()
            ->intended('/categorySimpanan')
            ->with('success', 'Data Berhasil Dihapus');
    }
}
