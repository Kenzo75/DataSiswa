@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Nama : {{ $siswa->nama }}</div>

                <div class="card-body">
                    <a href="{{ route('presensi.siswa', $siswa->id) }}" class="btn btn-danger mb-3">Kembali</a>
                    <form action="{{ route('masuk', $siswa->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kehadiran">Kehadiran</label>
                            <select name="kehadiran" id="kehadiran" class="form-control">
                                <option value="Hadir">Hadir</option>
                                <option value="Tidak Hadir">Tidak Hadir</option>
                                <option value="" hidden selected></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="hari">Hari :</label>
                            <select name="hari" id="hari" class="form-control">
                                <option value="" hidden selected></option>
                                <option value="senin">Senin</option>
                                <option value="selasa">Selesa</option>
                                <option value="rabu">Rabu</option>
                                <option value="kamis">Kamis</option>
                                <option value="jumat">Jumat</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <select name="keterangan" id="keterangan" class="form-control">
                                <option value="" hidden selected></option>
                                <option value="Masuk">Masuk</option>
                                <option value="Alpa">Alpa</option>
                                <option value="Sakit">Sakit</option>
                                <option value="Izin">Izin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-success mt-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
