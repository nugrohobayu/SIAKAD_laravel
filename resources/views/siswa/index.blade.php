@extends('template')

@section('main')


<div id="siswa">
    <h2>Daftar Siswa</h2>

    @if (!empty($siswa_list))

    <table class="table" style="text-align: center">
        <thead>
            <tr>
                <b>
                    <th>NO</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    <th>Action</th>
                </b>
            </tr>
        </thead>
        <tbody>

            <?php $i=1; ?>


            @foreach ($siswa_list as $siswa)
            <tr>
                <td>
                    <?= $i; ?>
                </td>
                <td>{{ $siswa -> nisn }}</td>
                <td>{{ $siswa -> nama_siswa }}</td>
                <td>{{ $siswa->kelas->nama_kelas }}</td>
                <td>{{ $siswa -> tgl_lahir->format("d-m-y") }}</td>

                <td>{{ $siswa -> jenis_kelamin}}</td>
                <td>{{ !empty($siswa->telepon->nomor_telepon) ? $siswa->telepon->nomor_telepon : '-' }}</td>

                <td>
                    <div class="box-button">
                        {{ link_to('siswa/' .$siswa->id, 'Detail', ['class' => 'btn btn-success btn-sm'])}}
                    </div>
                    <div class="box-button">
                        {{ link_to('siswa/' .$siswa->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}

                    </div>
                    <div class="box-button">
                        {!! Form::open(['method' => 'DELETE', 'action' => ['SiswaController@destroy', $siswa->id]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </div>
                </td>
            </tr>
            <?php $i++; ?>

            @endforeach
        </tbody>
    </table>

    @else
    <p>Tidak ada data siswa.</p>
    @endif



    <div class="table-nav">

        <div class="jumlah-data">
            <strong>Jumlah Siswa : {{ $jumlah_siswa}}</strong>
        </div>

        <div class="paging">
            {{ $siswa_list->links() }}
        </div>

    </div>

    <div class="tombol-nav">

        <a href="siswa/create" class="btn btn-primary"> Tambah Siswa</a>

    </div>
</div>

@endsection


@section('footer')
@include('footer')
@endsection