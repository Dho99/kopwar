<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $cekuser = User::where('kode_anggota', $request->kode_anggota)->first();
        $cekusrname = User::where('username', $request->username)->first();
        if(isset($cekuser) || isset($cekusrname)){
            return back()->with('message', 'Data telah tersedia');
        }else{
            $data = [
                'nama_lengkap' => $request->nama_lengkap,
                'username' => $request->username,
                'password' => $request->password,
                'status' => 'Aktif',
            ];
            $validated = Validator::make($data, [
                'nama_lengkap' => 'required|min:8|max:70',
                'username' => 'required|min:8',
                'password' => 'required|min:8',
                'status' => 'required',
            ]);
            if($validated->fails()){
                return back()->with('message', 'Data gagal ditambahkan karena tidak memenuhi syarat');
            }
            $data['kode_anggota'] = 'A-'.mt_rand(0000,9999);
            $data['level'] = '0';
            $data['password'] = bcrypt($request->password);
            User::create($data);
            Log::create([
                'kode_anggota' => auth()->user()->kode_anggota,
                'nama_lengkap' => auth()->user()->nama_lengkap,
                'level' => (auth()->user()->level === 'Pengurus' ? '1' : '0'),
                'aktivitas' => 'Menambahkan data Anggota '.$data['kode_anggota'],
            ]);
            return redirect()
                ->intended('/anggota')
                ->with('success', 'Data berhasil Disimpan!');
        }
    }

    public function store(Request $request)
    {
        $check = User::where('kode_anggota', $request->kode_anggota)->first();
        $ckusnme = User::where('username', $request->username)->first();
        if(isset($check->kode_anggota)){
            return back()->with('message','Tidak dapat menambahkan data');
        }elseif(isset($ckusnme->username)){
            return back()->with('message','Tidak dapat menambahkan data');
        }else{
            $validator = $request->validate([
                'nama_lengkap' => 'required',
                'username' => 'required|min:8',
                'password' => 'required|min:8',
                'status' => 'required',
            ]);
            $validator['level'] = '1';
            $validator['kode_anggota'] = 'A-'.mt_rand(0000,9999);
            User::create($validator);
        }
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

        $values = $request->validate([
            'nama_lengkap' => 'required|min:8|max:70',
            'kode_anggota' => 'required',
            'username' => 'required|min:8',
            'password' => 'required|min:8',
            'status' => 'required',
            'level' => 'required'
        ]);

        $values['password'] = bcrypt($request->password);
        // $values['level'] = auth()->user()->level == 'Pengurus' ? '1' : '0';

        $data = User::where('user_id', $user_id)->update($values);

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

            $values = $request->validate([
                'nama_lengkap' => 'required|min:8|max:70',
                'kode_anggota' => 'required',
                'username' => 'required|min:8',
                'password' => 'required|min:8',
                'status' => 'required',
                // 'level' => 'required'
            ]);

            $values['password'] = bcrypt($request->password);

            $data = User::where('user_id', $user_id)->update($values);
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
