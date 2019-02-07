@extends('layouts.app')
@section('title')
Tambah Matakuliah
@endsection

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tambah Matakuliah</h3>
                </div>
                {{ Form::open(['route' => 'matakuliah.store']) }}
                  @csrf
                    <div class="box-body">
                        <div class="form-group row">
                          <div class="col-xs-2">
                            <label for="">Kode Mk</label>
                            {{ Form::text('kode_mk', null, ['class' => 'form-control', 'placeholder' => 'Masukan Kode Matakuliah']) }}
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col-xs-3">
                          <label for="">Nama Mk</label>
                          {{ Form::text('nama_mk', null, ['class' => 'form-control', 'placeholder' => 'Masukan Nama Matakuliah']) }}
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="col-xs-2">
                        <label for="">Jumlah SKS</label>
                        {{ Form::number('jml_sks', null, ['class' => 'form-control', 'placeholder' => 'Masukan Jumlah Matakuliah']) }}
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-xs-3">
                      <label for="">Keterangan</label>
                      <span>Tidak wajib</span>
                      {{ Form::text('Keterangan', null, ['class' => 'form-control', 'placeholder' => 'Masukan Keterangan']) }}
                  </div>
                </div>

                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn bg-navy btn-md btn-flat">Simpan</button>
                    </div>
                {{ Form::close() }}
              </div>
            </div>
        </div>
</section>

@endsection
