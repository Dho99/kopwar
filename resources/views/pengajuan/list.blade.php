@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h3 class="card-title col-6">Daftar Pengajuan
                    @if (session()->has('simpanan'))
                        Simpanan
                    @elseif (session()->has('pinjaman'))
                        Pinjaman
                    @elseif (session()->has('angsuran'))
                        Angsuran
                    @elseif (session()->has('anggota'))
                        Anggota
                    @endif
                </h3>
                {{-- <div class="col-6">
                    @if (session()->has('simpanan'))
                        <a href="/newSimpanan" class="btn btn-primary float-right">Add new Data</a>
                    @elseif (session()->has('pinjaman'))
                        <a href="/newPinjaman" class="btn btn-primary float-right">Add new Data</a>
                    @elseif (session()->has('angsuran'))
                        <a href="/newAngsuran" class="btn btn-primary float-right">Add new Data</a>
                    @elseif (session()->has('anggota'))
                        <a href="/newAnggota" class="btn btn-primary float-right">Add new Data</a>
                    @endif
                </div> --}}
                <form action="/filterPengajuan" class="col-lg-6 col-md-6 col-sm-6 my-2 d-flex">
                    @csrf
                    <select name="jenis" class="form-control">
                        <option value="">Pilih Kategori</option>
                        <option value="Simpanan" {{ session()->has('simpanan') ? 'selected' : '' }}>Simpanan</option>
                        <option value="Pinjaman" {{ session()->has('pinjaman') ? 'selected' : '' }}>Pinjaman</option>
                        <option value="Angsuran" {{ session()->has('angsuran') ? 'selected' : '' }}>Angsuran</option>
                        {{-- <option value="Anggota" {{ session()->has('anggota') ? 'selected' : '' }}>Anggota</option> --}}
                    </select>
                    <button type="submit" class="btn btn-info">Filter</button>
                </form>

            </div>
        </div>
        <!-- /.card-header -->
        {{-- <p id="test"></p> --}}
        @php
            $categories = ['simpanan', 'pinjaman', 'angsuran', 'anggota'];
        @endphp

        @foreach ($categories as $category)
            @if (session()->has($category))
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">

                        @if ($category === 'simpanan')
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Simpanan</th>
                                    <th>Nama Anggota</th>
                                    <th>Jenis Simpanan</th>
                                    <th>Jumlah</th>
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session($category) as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_simpanan }}</td>
                                        <td>{{ $item->user->nama_lengkap }}</td>
                                        <td>{{ $item->simpan->jenis_simpanan }}</td>
                                        <td>@currency($item->jumlah)</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        @if ($item->status === 'Disetujui')
                                            <td class="text-success">
                                                Disetujui
                                            </td>
                                        @elseif($item->status === 'Ditolak')
                                            <td class="text-danger">
                                                Ditolak
                                            </td>
                                        @else
                                            <td>
                                                Pending
                                            </td>
                                        @endif
                                        <td>
                                            @if ($item->status === 'Ditolak' || $item->status === 'Disetujui')
                                                <a href="/deletePengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="Delete" class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                            @else
                                                <a href="/setujuPengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="View" class="btn btn-outline-success"><i
                                                        class="fa-solid fa-check"></i>
                                                </a>
                                                <a href="/tolakPengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="Delete" class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah anda yakin?')"><i
                                                        class="fa-solid fa-xmark"></i>
                                                </a>
                                            @endif
                                        </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Simpanan</th>
                                    <th>Nama Anggota</th>
                                    <th>Jenis Simpanan</th>
                                    <th>Jumlah</th>
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        @elseif($category === 'pinjaman')
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pinjaman</th>
                                    <th>Nama Anggota</th>
                                    <th>Jumlah</th>
                                    <th>Rencana Bayar</th>
                                    <th>Keterangan</th>
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session($category) as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kode_pinjaman }}</td>
                                        <td>{{ $item->user->nama_lengkap }}</td>
                                        <td>@currency($item->jumlah)</td>
                                        <td>@currency($item->rencana_bayar)</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        @if ($item->status === 'Disetujui')
                                            <td class="text-success">
                                                Disetujui
                                            </td>
                                        @elseif($item->status === 'Ditolak')
                                            <td class="text-danger">
                                                Ditolak
                                            </td>
                                        @else
                                            <td>
                                                Pending
                                            </td>
                                        @endif
                                        <td>
                                            @if ($item->status === 'Ditolak' || $item->status === 'Disetujui')
                                                <a href="/deletePengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="Delete" class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                            @else
                                                <a href="/setujuPengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="View" class="btn btn-outline-success"><i
                                                        class="fa-solid fa-check"></i>
                                                </a>
                                                <a href="/tolakPengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="Delete" class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah anda yakin?')"><i
                                                        class="fa-solid fa-xmark"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pinjaman</th>
                                    <th>Nama Anggota</th>
                                    <th>Jumlah</th>
                                    <th>Rencana Bayar</th>
                                    <th>Keterangan</th>
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        @elseif($category === 'angsuran')
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pinjaman</th>
                                    <th>Nama Anggota</th>
                                    <th>Jumlah</th>
                                    <th>Terbayar</th>
                                    <th>Sisa Hutang</th>
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (session($category) as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->pinjam->kode_pinjaman }}</td>
                                        <td>{{ $item->user->nama_lengkap }}</td>
                                        <td>@currency($item->pinjam->jumlah)</td>
                                        <td>@currency($item->pinjam->terbayar)</td>
                                        <td>@currency($item->pinjam->jumlah - $item->pinjam->terbayar)</td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        @if ($item->status === 'Disetujui')
                                            <td class="text-success">
                                                Disetujui
                                            </td>
                                        @elseif($item->status === 'Ditolak')
                                            <td class="text-danger">
                                                Ditolak
                                            </td>
                                        @else
                                            <td>
                                                Pending
                                            </td>
                                        @endif
                                        <td>
                                            @if ($item->status === 'Ditolak' || $item->status === 'Disetujui')
                                                {{-- @if ($item->category === 'Simpanan') --}}
                                                <a href="/viewPengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="View" class="btn btn-outline-primary"><i
                                                        class="fa-solid fa-eye"></i></a>
                                                <a href="/deletePengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="Delete" class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah anda yakin menghapus Data ini?')"><i
                                                        class="fa-solid fa-trash-can"></i></a>
                                            @else
                                                <a href="/setujuPengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="View" class="btn btn-outline-success"><i
                                                        class="fa-solid fa-check"></i>
                                                </a>
                                                <a href="/tolakPengajuan/{{ $item->id_pengajuan }}" data-toggle="tooltip"
                                                    data-placement="top" title="Delete" class="btn btn-outline-danger"
                                                    onclick="return confirm('Apakah anda yakin?')"><i
                                                        class="fa-solid fa-xmark"></i>
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Pinjaman</th>
                                    <th>Nama Anggota</th>
                                    <th>Jumlah</th>
                                    <th>Rencana Bayar</th>
                                    <th>Keterangan</th>
                                    <th>Dibuat Pada</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        @endif
                    </table>
                </div>
            @endif
        @endforeach

    </div>
@endsection
