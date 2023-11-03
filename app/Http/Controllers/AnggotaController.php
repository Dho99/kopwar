<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use App\Models\Log;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('anggota.list', [
            'title' => 'Pengurus',
            'datas' => User::where('level','1')->get(),
        ]);
    }

    public function anggotaIndex()
    {
        return view('anggota.anggotaList', [
            'title' => 'Anggota',
            'datas' => User::where('level','0')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create', [
            'title' => 'Anggota',
        ]);
    }


    public function createAnggota()
    {
        return view('anggota.createAnggota', [
            'title' => 'Anggota',
        ]);
    }


    public function storeAnggota(Request $request)
    {
        $data = [
            'kode_anggota' => 'A-' . mt_rand(100, 999),
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'status' => 'Aktif',
            'level' => $request->level,
        ];

            if (User::where('kode_anggota', $data['kode_anggota'])->first()) {
                return back()->with('message', 'Data yang dimasukkan sudah Ada !');
            } else if (User::where('username', $data['username'])->first()){
                return back()->with('message', 'Data yang dimasukkan sudah Ada !');
            }else if (Anggota::where('username', $data['username'])->first()){
                return back()->with('message', 'Data yang dimasukkan sudah Ada !');
            }else{
                User::create($data);
                Log::create([
                    'kode_anggota' => auth()->user()->kode_anggota,
                    'nama_lengkap' => auth()->user()->nama_lengkap,
                    'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                    'aktivitas' => 'Menambahkan data Anggota '.$data['kode_anggota'],
                ]);
                return redirect()
                    ->intended('/anggota')
                    ->with('success', 'Data berhasil Disimpan!');
            }

    }

    public function store(Request $request)
    {
        $data = [
            'kode_anggota' => 'A-' . mt_rand(100, 999),
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'status' => 'Aktif',
            'level' => $request->level,
        ];

            if (User::where('kode_anggota', $data['kode_anggota'])->first()) {
                return back()->with('message', 'Data yang dimasukkan sudah Ada !');
            } else if (Anggota::where('username', $data['username'])->first()){
                return back()->with('message', 'Data yang dimasukkan sudah Ada !');
            } else if (User::where('username', $data['username'])->first()){
                return back()->with('message', 'Data yang dimasukkan sudah Ada !');
            }else {
                User::create($data);
                Log::create([
                    'kode_anggota' => auth()->user()->kode_anggota,
                    'nama_lengkap' => auth()->user()->nama_lengkap,
                    'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                    'aktivitas' => 'Menambahkan data Anggota '.$data['kode_anggota'],
                ]);
                return redirect()
                    ->intended('/pengurus')
                    ->with('success', 'Data berhasil Disimpan!');
            }

    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        return view('anggota.view', [
            'title' => 'Pengurus',
            'datas' => User::where(['level' => '1', 'user_id' => $user_id])->get(),
        ]);
    }

    public function showAnggota($user_id)
    {
        return view('anggota.viewAnggota', [
            'title' => 'Anggota',
            'datas' => User::where(['level' => '0', 'user_id' =>  $user_id])->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        return view('anggota.edit', [
            'title' => 'Pengurus',
            'datas' => User::where(['level'=> '1','user_id' => $user_id])->get(),
        ]);
    }

    public function editAnggota($user_id)
    {
        return view('anggota.editAnggota', [
            'title' => 'Anggota',
            'datas' => User::where(['level' => '0', 'user_id' =>  $user_id])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {

        Log::create([
            'kode_anggota' => auth()->user()->kode_anggota,
            'nama_lengkap' => auth()->user()->nama_lengkap,
            'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
            'aktivitas' => 'Memperbarui data Anggota '.$request->kode_anggota. ' ( '.$request->nama_lengkap. ' )',
        ]);

        $data = User::where('user_id', $user_id)->update([
            'nama_lengkap' => $request->nama_lengkap,
            'kode_anggota' => $request->kode_anggota,
            'username' => $request->username,
            'password' => $request->password,
            'status' => $request->status,
            'level' => $request->level,
        ]);

        // foreach($data as $item)
        return redirect()
            ->intended('/pengurus')
            ->with('success', 'Data berhasil Diperbarui !');
        }
        
        public function updateAnggota(Request $request, $user_id)
    {
            Log::create([
                'kode_anggota' => auth()->user()->kode_anggota,
                'nama_lengkap' => auth()->user()->nama_lengkap,
                'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
                'aktivitas' => 'Memperbarui data Anggota '.$request->kode_anggota.' ( '.$request->nama_lengkap. ' )',
            ]);
            $data = User::where('user_id', $user_id)->update([
                'nama_lengkap' => $request->nama_lengkap,
                'kode_anggota' => $request->kode_anggota,
                'username' => $request->username,
                'password' => $request->password,
                'status' => $request->status,
                // 'level' => $request->level,
            ]);
            // dd($data);

        // foreach($data as $item)
        return redirect()
            ->intended('/viewDataAnggota/'.$user_id)
            ->with('success', 'Data berhasil Diperbarui !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id)
    {
        $data = User::where('user_id', $user_id)->get();
        foreach($data as $item)
        Log::create([
            'aktivitas' => 'Menghapus data Anggota '.$item->kode_anggota,
            'nama_lengkap' => auth()->user()->nama_lengkap,
            'kode_anggota' => auth()->user()->kode_anggota,
            'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
        ]);
        User::where('user_id', $user_id)->delete();
        return redirect()
            ->intended('/pengurus')
            ->with('success', 'Data berhasil Dihapus!');
    }

    public function destroyAnggota($user_id)
    {
        $data = User::where('user_id', $user_id)->get();
        User::where('user_id', $user_id)->delete();
        foreach($data as $item)
        Log::create([
            'kode_anggota' => auth()->user()->kode_anggota,
            'nama_lengkap' => auth()->user()->nama_lengkap,
            'aktivitas' => 'Menghapus data Anggota '.$item->kode_anggota,
            'level' => (auth()->user()->level === 'Pengurus' ? 'Pengurus' : 'Anggota'),
        ]);
        return redirect()
            ->intended('/anggota')
            ->with('success', 'Data berhasil Dihapus!');
    }
}
