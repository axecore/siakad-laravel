@extends('layouts.app')
@section('title')
Trash Matakuliah
@endsection

@section('content')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">

                @if (Session::has('matakuliahPermanent'))
                <div class="alert-success text-center" role="alert" id="alert">
                    <strong> {{ Session::get('matakuliahPermanent') }} </strong>
                </div>
                @endif

                <div class="box-header">
                    <h3 class="box-title"> <i class="fa fa-trash"></i> Trash Matakuliah</h3>
                </div>

                <div class="box-body">
                    <div class="table-responsive">
                        <table id="data-mk" width="100%" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Kode Mk</th>
                                    <th>Nama Mk</th>
                                    <th>Jumlah SKS</th>
                                    <th>Keterangan</th>
                                    <th>Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-md bg-navy btn-flat"> <i class="fa fa-table"></i> </a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')

<script>
    $(function() {
        $('#data-mk').DataTable({
            processing: true,
            serverSide: true,
            lengthMenu: [
                [5, 10, 50, -1],
                [5, 10, 50, "All"]
            ],
            language: {
                "processing": "Tunggu...",
                "sLengthMenu": "Tampilkan _MENU_ data",
                "sZeroRecords": "Data tidak ditemukan...",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
                "sInfoFiltered": "(disaring dari _MAX_ data keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari Data:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            ajax: '/matakuliah/trash/json',
            columns: [{
                    data: 'kode_mk',
                    name: 'kode_mk'
                },
                {
                    data: 'nama_mk',
                    name: 'nama_mk'
                },
                {
                    data: 'jml_sks',
                    name: 'jml_sks'
                },
                {
                    data: 'ket_mk',
                    name: 'ket_mk'
                },
                {
                    data: 'action',
                    name: 'action'
                }
            ]
        });
    });

    $("#alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#success-alert").slideUp(500);
    });
</script>

@endpush
