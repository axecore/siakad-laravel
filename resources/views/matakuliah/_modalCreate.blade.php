<!-- Modal -->
<div class="modal fade" id="create_mk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title text-muted" id="exampleModalLabel">Tambah Matakuliah</h3>
            </div>
            <div class="modal-body">

                {{ Form::open(['route' => 'matakuliah.store']) }}
                @csrf
                <div class="box-body">
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <label for="">Kode Mk</label>
                            {{ Form::text('kode_mk', null, ['class' => 'form-control']) }}
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
                            {{ Form::text('nama_mk', null, ['class' => 'form-control']) }}
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
                            {{ Form::number('jml_sks', null, ['class' => 'form-control']) }}
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
                            {{ Form::text('ket_mk', null, ['class' => 'form-control']) }}
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
            </div>
        </div>
    </div>
</div>
