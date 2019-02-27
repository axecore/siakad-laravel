@extends('layouts.app')
@section('title')
Tambah Dosen
@endsection

@section('content')

  <style media="screen">
      #foto{
          max-width:200px;
      }
  </style>

<section class="content">
    <div class="row">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Dosen</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {{ Form::open(['route' => 'dosen.store', 'enctype' => 'multipart/form-data', 'onchange' => 'preview_image(event)']) }}
              @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="">NIK/NIP</label>
                        {{ Form::text('nik_nip', null, ['class' => 'form-control']) }}
                        @if ($errors->has('nik_nip'))
                          <div class="alert-danger">
                              <strong>{{ $errors->first('nik_nip') }}</strong>
                          </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Nama</label>
                        {{ Form::text('nama', null, ['class' => 'form-control']) }}
                        @if ($errors->has('nama'))
                          <div class="alert-danger">
                            <strong>{{ $errors->first('nama') }}</strong>
                          </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        {{ Form::email('email', null, ['class' => 'form-control']) }}
                        @if ($errors->has('email'))
                          <div class="alert-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                          </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No HP</label>
                        {{ Form::text('no_hp', null, ['class' => 'form-control']) }}
                        @if ($errors->has('no_hp'))
                          <div class="alert-danger">
                            <strong>{{ $errors->first('no_hp') }}</strong>
                          </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        {{ Form::file('foto', null, ['class' => 'form-control']) }}
                        @if ($errors->has('foto'))
                          <div class="alert-danger">
                            <strong>{{ $errors->first('foto') }}</strong>
                          </div>
                        @endif
                        <p class="help-block">Masukan foto asli</p>
                        <img id="foto" src="#" alt="Preview" />
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-md btn-flat bg-navy" name="button"><i class="fa fa-save"></i></button>
                    <a href="{{ route('dosen.index') }}" class="btn btn-md bg-navy btn-flat"> <i class="fa fa-chevron-circle-left"></i> </a>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</section>

@endsection

@push('scripts')
  <script type='text/javascript'>
        function preview_image(event)
            {
             var reader = new FileReader();
             reader.onload = function()
             {
              var output = document.getElementById('foto');
              output.src = reader.result;
             }
             reader.readAsDataURL(event.target.files[0]);
        }
  </script>
@endpush
