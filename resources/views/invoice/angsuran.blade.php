@extends('layouts.main')
@section('content')

<div class="row">
    <div class="col-12">
      {{-- <div class="callout callout-info">
        <h5><i class="fas fa-info"></i> Note:</h5>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
      </div> --}}


      <!-- Main content -->
      @foreach ($datas as $item)

      <div class="invoice p-3 mb-3">
        <!-- title row -->
        <div class="row mb-3">
          <div class="col-12">
            <h4>
              <img src="{{asset('dist/img/Logo Koperasi.png')}}" class="img-fluid col-1 d-inline-flex" alt=""> 
                <span class="font-weight-bold align-items-center">
                  INVOICE
                </span>
              <small class="float-right mt-2">Date: {{$item->created_at->format('d-m-Y')}}</small>
            </h4>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info mb-3">
          <div class="col-sm-4 invoice-col">
            From
            <address>
              <strong>Koperasi Warga INTENS</strong><br>
              SMKN 2<br>
              Kota Tasikmalaya<br>
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            To
            <address>
              <strong>{{$item->user->nama_lengkap}}</strong><br>
              Di Tempat<br>
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <b>Invoice </b>{{$item->pinjam->kode_pinjaman }}<br>
            {{-- <br> --}}
            <b>Pinjaman ID:</b> {{$item->pinjam_id}}<br>
            {{-- <b>Payment Due:</b> 2/22/2014<br> --}}
            <b>Kode Anggota:</b> {{$item->user->kode_anggota}}
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        {{-- @dd($datas) --}}
        <!-- Table row -->
        <div class="row">
          <div class="col-12 table-responsive">
            <table class="table table-striped">
              <thead>
              <tr>
                <th>Kode Pinjaman</th>
                <th>Jumlah</th>
                <th>Rencana Bayar</th>
                {{-- <th>Keterangan</th> --}}
                <th>Terbayar</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>{{$item->pinjam->kode_pinjaman}}</td>
                <td>@currency($item->pinjam->jumlah)</td>
                <td>@currency($item->pinjam->rencana_bayar)</td>
                {{-- <td>{{$item->keterangan}}</td> --}}
                <td>@currency($item->terbayar)</td>
                @if ($item->jumlah !== $item->terbayar)
                    <td class="text-danger">Belum Lunas</td>
                    @else
                    <td class="text-success">Lunas</td>
                    
                @endif
              </tr>
  
              </tbody>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <!-- accepted payments column -->
          <div class="col-6 my-4">
            {{-- <p class="lead">Payment Methods:</p>
            <img src="../../dist/img/credit/visa.png" alt="Visa">
            <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
            <img src="../../dist/img/credit/american-express.png" alt="American Express">
            <img src="../../dist/img/credit/paypal2.png" alt="Paypal"> --}}

            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
              Harap Simpan Invoice ini dengan baik Untuk bukti Transaksi yang sah
            </p>
          </div>
          <!-- /.col -->
      
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print mb-4">
          <div class="col-12">
            <a href="/pinjaman" class="btn btn-outline-secondary">Kembali</a>
            <a href="" rel="noopener" target="_blank" onclick="window.print()" class="btn btn-secondary w-25 float-right"><i class="fas fa-print mr-2"></i> Print</a>
          </div>
        </div>
      </div>

      @endforeach
      <!-- /.invoice -->
    </div><!-- /.col -->
  </div>
  
@endsection