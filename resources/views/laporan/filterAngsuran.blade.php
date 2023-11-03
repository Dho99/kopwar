@extends('layouts.main')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Transaksi Angsuran</h3>
        </div>
        <div class="row mt-3 ml-2 mt-4 mb-1">
            <p class="col-12 mb-2 text-muted">Filter Data berdasarkan Tanggal</span>
                <p class="text-muted col-12">
                    {{-- <b>Jumlah Piutang: </b> <span id="total_records"></span><br> --}}
                    <b>Jumlah Data: </b> <span id="jumlah_data"></span>
                </p>
            </p>
            <div class="col-6">
                <div class="input-group my-2">
                    <select name="" id="category" hidden>
                        <option value="Angsuran" selected>Angsuran</option>
                    </select>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Dari</b></span>
                    </div>
                    <input type="text" class="form-control bg-light ronded-right" id="from_date" name="from_date"
                        readonly>
                    <div class="input-group-prepend">
                        <span class="input-group-text"><b>Sampai</b></span>
                    </div>
                    <input type="text" class="form-control bg-light" id="to_date" name="to_date" readonly>
                </div>
            </div>
            <div class="col-6 input-group mb-2">
                <button type="button" id="filter" class="btn btn-primary mt-2 mr-1">
                    <i class="fa-solid fa-filter"></i>
                </button>
                <button type="button" id="refresh" class="btn btn-warning mt-2">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="records" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Kode Pinjaman</th>
                        <th>Terbayar</th>
                        <th>Sisa Hutang</th>
                        <th>Dibuat Pada</th>

                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
    </div>
@endsection
