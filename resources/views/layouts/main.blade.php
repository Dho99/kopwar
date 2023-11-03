<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kopwar | {{ $title }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">



</head>
<style>
    .modal-dialog {
        margin-top: 15%;
    }
</style>

@if (auth()->check())

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('partials.navbar')
            @include('partials.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="">{{ $title }}</h1>
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                </section>
                <!-- /.content -->
            </div>
            @include('partials.footer')
        </div>
        <div class="modal-wrapper">
            <div class="modal fade" id="logoutModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Log out</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin akan Log out ?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tetap Disini</button>
                            <a href="/logout" class="btn btn-outline-danger">Tetap Log out</a>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </body>
@endif
<!-- ./wrapper -->

<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
<script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>

<script>
    $('[data-mask="currency"]').inputmask({
    alias: 'numeric',
    radixPoint: ',',
    groupSeparator: '.',
    digits: 2,
    autoGroup: true,
    prefix: 'Rp ',
    rightAlign: false,
    reverse: true,
  });
    $(document).ready(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "buttons": ['print', 'excel', 'pdf'],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4',
            tags:true
        });
    });

    @if (session()->has('message'))
        toastr.error("{{ session('message') }}");
    @endif
    @if (session()->has('success'))
        toastr.success("{{ session('success') }}");
    @endif
    @if (session()->has('greet'))
        toastr.info("{{ session('greet') }}");
    @endif

    function generateRandNumber() {
        const random = Math.floor(Math.random() * 999999);
        document.getElementById('randomInput').value = 'PIN-' + random;
    }

    $(function() {
        $("#from_date").datepicker({
            dateFormat: "yy-mm-dd",
        });
    });

    $(function() {
        $("#to_date").datepicker({
            dateFormat: "yy-mm-dd",
        });
    });

    function fetch(from_date, to_date, data) {
        if (data == "Pinjaman") {
            $.ajax({
                url: "/filterPinjaman",
                type: "GET",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                dataType: "json",
                success: function(data) {
                    updateTable('#records', data.pinjamans,
                        [{
                                "title": "No.",
                                "data": null,
                                render: function(data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }
                            },
                            {
                                "title": "Nama Anggota",
                                "data": "user.nama_lengkap",
                            },
                            {
                                "title": "Kode Pinjaman",
                                "data": "kode_pinjaman",
                            },
                            {
                                "title": "Terbayar",
                                "data": "terbayar",
                                "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp. '),
                            },
                            {
                                "title": "Sisa Hutang",
                                "data": "jumlah",
                                "render": function(data, type, row, meta) {
                                    var sisaHutang = row.jumlah - row.terbayar;
                                    if (type === 'display') {
                                        return 'Rp. ' + $.fn.dataTable.render.number(',', '.', 0,
                                            '').display(sisaHutang);
                                    }
                                    return sisaHutang;
                                }
                            },
                            {
                                "title": "Dibuat Pada",
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('DD-MM-YYYY');
                                }
                            },
                        ]
                    );
                    var totalRecords = $('#records').DataTable().page.info().recordsTotal;
                    $('#jumlah_data').text(totalRecords);

                    var table = $('#records').DataTable();
                    var columnData = table.column(3).data();
                    var sum = 0;
                    columnData.each(function(value) {
                        sum += parseFloat(value);
                    });
                    var formattedSum = $.fn.dataTable.render.number(',', '.', 0, 'Rp. ').display(sum);
                    $('#total_records').text(formattedSum);
                }
            });
        }
        if (data == "Simpanan") {
            $.ajax({
                url: "/filterSimpanan",
                type: "GET",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                dataType: "json",
                success: function(data) {
                    updateTable('#records', data.simpanans,
                        [{
                                "title": "No",
                                "data": "id",
                                render: function(data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }
                            },
                            {
                                "title": "Nama Anggota",
                                "data": "user.nama_lengkap",
                            },
                            {
                                "title": "Jenis Simpanan",
                                "data": "category.jenis_simpanan",
                            },
                            {
                                "title": "Jumlah",
                                "data": "jumlah",
                                "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp. '),
                            },
                            {
                                "title": "Periode",
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('MM-YYYY');
                                }
                            },
                            {
                                "title": "Dibuat Pada",
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('DD-MM-YYYY');
                                }
                            }
                        ]
                    );
                    var totalRecords = $('#records').DataTable().page.info().recordsTotal;
                    $('#jumlah_data').text(totalRecords);

                    var table = $('#records').DataTable();
                    var columnData = table.column(3).data();
                    var sum = 0;
                    columnData.each(function(value) {
                        sum += parseFloat(value);
                    });
                    var formattedSum = $.fn.dataTable.render.number(',', '.', 0, 'Rp. ').display(sum);
                    $('#total_records').text(formattedSum);

                }
            });
        }
        if (data == "Angsuran") {
            $.ajax({
                url: "/filterAngsuran",
                type: "GET",
                data: {
                    from_date: from_date,
                    to_date: to_date
                },
                dataType: "json",
                success: function(data) {
                    updateTable('#records', data.angsurans,
                        [{
                                "title": "No.",
                                "data": "id",
                                render: function(data, type, row, meta) {
                                    return meta.row + meta.settings._iDisplayStart + 1;
                                }
                            },
                            {
                                "title": "Nama Lengkap",
                                "data": "user.nama_lengkap",
                            },
                            {
                                "title": "Kode Pinjaman",
                                "data": "pinjam.kode_pinjaman",
                            },
                            {
                                "title": "Jumlah",
                                "data": "pinjam.jumlah",
                                "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp. '),
                            },
                            {
                                "title": "Terbayar",
                                "data": "terbayar",
                                "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp. '),
                            },
                            {
                                "title": "Dibuat Pada",
                                "data": "created_at",
                                "render": function(data, type, row, meta) {
                                    return moment(row.created_at).format('DD-MM-YYYY');
                                }
                            },

                        ]
                    );
                    var totalRecords = $('#records').DataTable().page.info().recordsTotal;
                    $('#jumlah_data').text(totalRecords);

                    // var table = $('#records').DataTable();
                    // var columnData = table.column(3).data();
                    // var sum = 0;
                    // columnData.each(function(value) {
                    //     sum += parseFloat(value);
                    // });
                    // var formattedSum = $.fn.dataTable.render.number(',', '.', 0, 'Rp. ').display(sum);
                    // $('#total_records').text(formattedSum);
                }
            });
        }
    }
    $(document).on("click", "#filter", function(e) {
        e.preventDefault();
        var from_date = $("#from_date").val();
        var to_date = $("#to_date").val();
        var data = $("#category").val();

        if (from_date == "" || to_date == "" || data == "") {
            toastr.warning('Harap Masukkan data Terlebih Dahulu!');
        } else {
            $("#records").DataTable().destroy();
            fetch(from_date, to_date, data);
        }
    });

    $(document).on("click", "#refresh", function(e) {
        e.preventDefault();
        $("#from_date").val('');
        $("#to_date").val('');
        $("#category").val();
        fetch();
    });


    function updateTable(table, data, column) {
        const buttons = ['print', 'excel']

        // if (table === "#records1") buttons.push('pdf')

        $(table).empty();

        $(table).DataTable({
            "data": data,
            "responsive": true,
            destroy: true,
            columns: column,
            dom: 'Bfrtip',
            buttons,
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        }).draw();
    }
</script>
</body>

</html>
