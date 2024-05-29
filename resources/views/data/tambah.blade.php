@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Data Siswa Kelas XI PPLG A</div>

                <div class="card-body">
                    <a href="{{ route('home') }}" class="btn btn-danger mb-3">Kembali</a>
                    <form action="{{ route('simpan') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" @error('nama') is-invalid @enderror" required autocomplete="nama">
                            @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <input type="text" name="jk" id="jk" class="form-control" @error('jk') is-invalid @enderror" required autocomplete="jk">
                            @error('jk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nisn">Nisn</label>
                            <input type="number" name="nisn" id="nisn" class="form-control" @error('nisn') is-invalid @enderror" required autocomplete="nisn">
                            @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ttl">Tanggal Lahir</label>
                            <input type="date" name="ttl" id="ttl" class="form-control" @error('ttl') is-invalid @enderror" required autocomplete="ttl">
                            @error('ttl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" id="alamat" class="form-control" @error('alamat') is-invalid @enderror" required autocomplete="alamat">
                            @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
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
