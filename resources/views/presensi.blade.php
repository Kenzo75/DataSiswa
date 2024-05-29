@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Presensi {{ $siswa->nama }} <br>
                    <a href="{{ route('home') }}" class="btn btn-danger">Kembali</a> ( {{ now()->format('l, j F Y') }} )
                </div>

                <div class="card-body">
                    <a href="{{ route('presensi', $siswa->id) }}" class="btn btn-primary mb-3">Masukan Presensi</a>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <td>Nama</td>
                                <td>Hari</td>
                                <td>Kehadiran</td>
                                <td>Keterangan</td>
                                <td>Tanggal dan Waktu</td>
                                <td>hapus</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presensis as $presensi)
                                <tr>
                                    <td>{{ $presensi->siswa->nama }}</td>
                                    <td>{{ $presensi->hari }}</td>
                                    <td>{{ $presensi->kehadiran }}</td>
                                    <td>{{ $presensi->keterangan }}</td>
                                    <td>{{ $presensi->created_at }}</td>
                                    <td>
                                        <form action="{{ route('hapus.presensi', $presensi->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
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
