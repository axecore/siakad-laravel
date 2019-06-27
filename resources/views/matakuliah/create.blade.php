@extends('layouts.app')
@section('title')
Tambah Mata Kuliah
@endsection

@section('content')

<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Matakuliah</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::open(['route' => 'matakuliah.store', 'enctype' => 'multipart/form-data', 'onchange' => 'preview_image(event)']) }}
              @csrf
                <div class="box-body">
                    <div class="form-group row">
                    	<div class="col-xs-3">
	                        <label for="">Kode Matakuliah</label>
	                        {{ Form::text('kode_mk', null, ['class' => 'form-control']) }}
	                        @if ($errors->has('kode_mk'))
	                          <div class="alert-danger">
	                              <strong>{{ $errors->first('kode_mk') }}</strong>
	                          </div>
	                        @endif
                        </div>
                    </div>
                    <div class="form-group row">
                    	<div class="col-xs-3">
	                        <label for="">Nama Matakuliah</label>
	                        {{ Form::text('nama_mk', null, ['class' => 'form-control']) }}
	                        @if ($errors->has('nama_mk'))
	                          <div class="alert-danger">
	                            <strong>{{ $errors->first('nama_mk') }}</strong>
	                          </div>
	                        @endif
                    	</div>
                    </div>
                    <div class="form-group row">
                    	<div class="col-xs-3">
	                        <label for="">Jumlah SKS</label>
	                        {{ Form::number('jml_sks', null, ['class' => 'form-control']) }}
	                        @if ($errors->has('jml_sks'))
	                          <div class="alert-danger">
	                            <strong>{{ $errors->first('jml_sks') }}</strong>
	                          </div>
	                        @endif
                    	</div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Keterangan</label>
                        {{ Form::textarea('ket_mk', null, ['class' => 'form-control']) }}
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-md btn-flat bg-navy" name="button"><i class="fa fa-save"></i></button>
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-md bg-navy btn-flat"> <i class="fa fa-chevron-circle-left"></i> </a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</section>

@endsection
