<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('admin.anggota.anggota', compact('users'), [
            'title' => 'Data Anggota',
            'total' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function formCreate(){
        return view('admin.anggota.tambah', [
            'title' => "Data Anggota"
        ]);
    }

    public function getData(Request $request) {
        $find = $request->input('nama_anggota');
        $hasil = User::where('nama_lengkap','LIKE', '%' . $find .'%')->get();
        return view('admin.anggota.search',compact('hasil'), [
            'title' => 'Hasil Search',
            'data' => $hasil
        ])->with('message', 'Maaf Data yang anda cari Kosong');
    }


    public function create(Request $request)
    {
        $create = User::create([
            'kode_anggota' => $request->kode_anggota,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => base64_encode(base64_encode(base64_encode($request->password))),
            'status' => 'aktif',
        ]);

        // dd($create);
        return redirect()->intended('/admin/data/anggota');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($anggota_id)
    {
        return view('admin.edit.anggota', [
            'title' => 'Data Anggota',
            'items' => User::all()->where('anggota_id', $anggota_id)
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($anggota_id)
    {
        return view('admin.edit.edit-anggota', [
            'title' => 'Data Anggota',
            'items' => User::all()->where('anggota_id', $anggota_id)
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $store = User::where('anggota_id', $request->anggota_id)->update([
            'kode_anggota' => $request->kode,
            'nama_lengkap' => $request->nama,
            'username' => $request->username,
            'password' => base64_encode(base64_encode(base64_encode($request->password))),
            'status' => $request->status,
        ]);

        return redirect()->intended('/admin/data/anggota');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($anggota_id)
    {
        $delete = User::where('anggota_id', $anggota_id)->delete();
        return redirect()->intended('/admin/data/anggota');
    }
}
