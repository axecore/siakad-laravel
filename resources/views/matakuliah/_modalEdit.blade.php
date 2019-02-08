<!-- Modal -->
<div class="modal fade" id="edit_mk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-muted" id="exampleModalLabel">Edit Matakuliah</h3>
            </div>
            <div class="modal-body" id="body-edit">

                {{ Form::open(['route' => ['matakuliah.update', 'test']]) }}
                {{-- <form class="" action="/matakuliah/''" method="post"> --}}
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="">Kode Mk</label>
                            {{ Form::text('kode_mk', null, ['class' => 'form-control', 'id' => 'kode_mk', 'readonly' => 'readonly']) }}
                            @if ($errors->has('kode_mk'))
                            <div class="alert-danger text-center">
                                <strong>Error Input</strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="">Nama Mk</label>
                            {{ Form::text('nama_mk', null, ['class' => 'form-control', 'id' => 'nama_mk']) }}
                            @if ($errors->has('nama_mk'))
                            <div class="alert-danger text-center">
                                <strong>Error Input</strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-3">
                            <label for="">Jumlah SKS</label>
                            {{ Form::number('jml_sks', null, ['class' => 'form-control', 'id' => 'jml_sks']) }}
                            @if ($errors->has('jml_sks'))
                            <div class="alert-danger text-center">
                                <strong>Error Input</strong>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label for="">Keterangan</label>
                            <span>tidak wajib</span>
                            {{ Form::text('ket_mk', null, ['class' => 'form-control', 'id' => 'ket_mk']) }}
                            @if ($errors->has('ket_mk'))
                            <div class="alert-danger text-center">
                                <strong>Error Input</strong>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->

            </div>

            <div class="modal-footer">
                <button type="button" class="btn bg-maroon btn-flat" data-dismiss="modal"> <i class="fa fa-close"></i> </button>
                <button type="submit" class="btn bg-olive btn-flat"> <i class="fa fa-save"></i> </button>
                {{ Form::close() }}
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(document).on('click', '#edit_klik', function() {
        var kode_mk = $(this).data('kode_mk');
        var nama_mk = $(this).data('nama_mk');
        var jml_sks = $(this).data('jml_sks');
        var ket_mk = $(this).data('ket_mk');
        $("#body-edit #kode_mk").val(kode_mk);
        $("#body-edit #nama_mk").val(nama_mk);
        $("#body-edit #jml_sks").val(jml_sks);
        $("#body-edit #ket_mk").val(ket_mk);
    });
</script>
@endpush
