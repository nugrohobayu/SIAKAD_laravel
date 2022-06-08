@extends('template')

@section('main')
<div id="siswa">
    <h2>Edit Data Siswa</h2>
    @if (isset($siswa))
    {!! Form::hidden('id', $siswa->id) !!}

    @endif



    {!! Form::model($siswa, ['method' => 'PATCH', 'action' => ['SiswaController@update', $siswa->id]]) !!}
    @include('siswa.form', ['submitButtonText' => 'update'])
    {!! Form::close() !!}

</div>


@endsection

@section('footer')
@include('footer')
@endsection