@if(isset($siswa))
{!! Form::hidden('id',$siswa->id)!!}
@endif

@if ($errors->any())
<div class="form-group {{ $errors->has('nisn') ? 'has-error' : 'has-success' }}">
    @else
    <div class="form-group">
        @endif
        {!! Form::label('nisn', 'NISN :', ['class' => 'control-label']) !!}
        {!! Form::text('nisn', null, ['class' => 'form-control']) !!}

        @if ($errors->has('nisn'))
        <span class="help-block">{{ $errors->first('nisn') }} </span>

        @endif
    </div>


    @if ($errors->any())
    <div class="form-group {{ $errors->has('nama_siswa') ? 'has-error' : 'has-success' }}">
        @else
        <div class="form-group">
            @endif
            {!! Form::label('nama_siswa', 'Nama Siswa :', ['class' => 'control-label']) !!}
            {!! Form::text('nama_siswa', null, ['class' => 'form-control']) !!}

            @if ($errors->has('nama_siswa'))
            <span class="help-block">{{ $errors->first('nama_siswa') }} </span>

            @endif
        </div>


        @if ($errors->any())
        <div class="form-group {{ $errors->has('tgl_lahir') ? 'has-error' : 'has-success' }}">
            @else
            <div class="form-group">
                @endif
                {!! Form::label('tgl_lahir', 'Tanggal Lahir :', ['class' => 'control-label']) !!}
                {!! Form::date('tgl_lahir', null, ['class' => 'form-control']) !!}

                @if ($errors->has('tgl_lahir'))
                <span class="help-block">{{ $errors->first('tgl_lahir') }} </span>

                @endif
            </div>



            @if ($errors->any())
            <div class="form-group {{ $errors->has('nomor_telepon') ? 'has-error' : 'has-success' }}">
                @else
                <div class="form-group">
                    @endif
                    {!! Form::label('nomor_telepon', 'Telepon :', ['class' => 'control-label']) !!}
                    {!! Form::text('nomor_telepon', null, ['class' => 'form-control']) !!}

                    @if ($errors->has('nomor_telepon'))
                    <span class="help-block">{{ $errors->first('nomor_telepon') }} </span>

                    @endif
                </div>



                @if ($errors->any())
                <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : 'has-success' }}">

                    @else
                    <div class="form-group">
                        @endif
                        {!! Form::label('jenis_kelamin', 'Jenis Kelamin :', ['class' => 'control-label']) !!}
                        <div class="radio">
                            <label for="">{!! Form::radio('jenis_kelamin', 'L') !!} Laki-laki</label>
                        </div>
                        <div class="radio">
                            <label for=""> {!! Form::radio('jenis_kelamin', 'P') !!} Perempuan</label>
                        </div>

                        @if ($errors->has('jenis_kelamin'))
                        <span class="help-block"> {{ $errors->first('jenis_kelamin') }}</span>

                        @endif

                    </div>



                    @if ($errors->any())
                    <div class="form-group {{ $errors->has('id_kelas') ? 'has-error' : 'has-success' }}">

                        @else
                        <div class="form-group">
                            @endif
                            {!! Form::label('id_kelas', 'Kelas :', ['class' => 'control-label']) !!}

                            @if (count($list_kelas) > 0)
                            {!! Form::select('id_kelas', $list_kelas, null, ['class' => 'form-control', 'id' =>
                            'id_kelas',
                            'placeholder' => 'pilih kelas']) !!}

                            @else
                            <p>tidak ada pilihan kelas, buat dulu ya..!</p>
                            @endif

                            @if ($errors->has('id_kelas'))
                            <span class="help-block">{{ $errors->first('id_kelas') }} </span>

                            @endif
                        </div>

                        @if ($errors->any())
                        <div class="form-group {{ $errors->has('hobi') ? 'has-error' : 'has-success' }}">

                            @else
                            <div class="form-group">
                                @endif
                                {!! Form::label('hobi_siswa', 'Hobi :', ['class' => 'control-label']) !!}

                                @if (count($list_hobi) > 0)
                                @foreach ($list_hobi as $key => $value)
                                <div class="checkbox">
                                    <label for="">
                                        {!! Form::checkbox('hobi_siswa[]', $key, null) !!}
                                        {{$value}}
                                    </label>
                                </div>

                                @endforeach
                                @else
                                <p>tidak ada pilihan hobi, buat dulu ya..!</p>
                                @endif

                                @if ($errors->has('hobi'))
                                <span class="help-block">{{ $errors->first('hobi') }} </span>

                                @endif
                            </div>


                            <div class="form-group">
                                {!! Form::submit($submitButtonText, ['class' => 'btn btn-success form-control']) !!}
                            </div>
                        </div