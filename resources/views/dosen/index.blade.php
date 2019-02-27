@extends('layouts.app')
@section('title')
Data Dosen
@endsection

@section('content')


<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">


                @if (Session::has('dosenCreate'))
                <div class="alert-success text-center" role="alert" id="alert">
                    <strong> {{ Session::get('dosenCreate') }} </strong>
                </div>
                @endif
                @if (Session::has('dosenUpdate'))
                <div class="alert-success text-center" role="alert" id="alert">
                    <strong> {{ Session::get('dosenUpdate') }} </strong>
                </div>
                @endif
                @if (Session::has('matakuliaDelete'))
                <div class="alert-success text-center" role="alert" id="alert">
                    <strong> {{ Session::get('matakuliaDelete') }} </strong>
                </div>
                @endif
                @if (Session::has('matakuliahRestore'))
                <div class="alert-success text-center" role="alert" id="alert">
                    <strong> {{ Session::get('matakuliahRestore') }} </strong>
                </div>
                @endif

                <div class="box-header">
                    <h3 class="box-title"> <i class="fa fa-database"></i> Data Dosen</h3>
                </div>

                <div class="box-body">
                    <table id="data-dosen" width="100%" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>NIK/NIP</th>
                                <th>Nama Dosen</th>
                                <th>Email</th>
                                <th>No HP</th>
                                <th>Foto</th>
                                <th>Pilihan</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
                </div>
                <div class="box-footer">
                    <a href="{{ route('dosen.create') }}" class="btn bg-navy btn-flat btn-md"><i class="fa fa-plus-square"></i></a>
                    <a href="#" class="btn bg-navy btn-flat btn-md"> <i class="fa fa-trash-o"></i></a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')

<script>
    $(function() {
        $('#data-dosen').DataTable({
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
            ajax: '{{ route('dosen.json') }}',
            columns: [{
                    data: 'nik_nip',
                    name: 'nik_nip'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'no_hp',
                    name: 'no_hp'
                },
                {
                    data: 'foto',
                    name: 'foto',
                    orderable: false,
                    searchable: false
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
