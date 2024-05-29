@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Data Siswa Kelas XI PPLG A<br>
                </div>

                <div class="card-body">
                    @if (Auth::user()->peran() == 'Guru')
                    <a href="{{ route('tambah') }}" class="btn btn-primary mb-3">Tambah Data Siswa</a>
                    @else
                    @endif
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <td>Nama</td>
                                <td>Jenis Kelamin</td>
                                <td>Nisn</td>
                                <td>Tanggal Lahir</td>
                                <td>Alamat</td>
                                <td>Edit</td>
                                <td>Hapus</td>
                                <td>Data Presensi</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswas as $siswa)
                                <tr>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{{ $siswa->jk }}</td>
                                    <td>{{ $siswa->nisn }}</td>
                                    <td>{{ $siswa->ttl }}</td>
                                    <td>{{ $siswa->alamat }}</td>
                                    <td><a href="{{ route('editTambah', $siswa->id) }}" class="btn btn-primary">Edit Data Siswa</a></td>
                                    <td>
                                        <form action="{{ route('hapus.siswa', $siswa->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('presensi.siswa', $siswa->id) }}" class="btn btn-secondary">Presensi</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
