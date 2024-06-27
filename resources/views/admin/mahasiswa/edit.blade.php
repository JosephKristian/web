@extends('layouts.lema')

@section('content')
<div class="container">
    <div class="card card-form">
        <div class="row no-gutters">
            <div class="col-lg-4 card-body">
                <p><strong class="headings-color">Form Update Mahasiswa</strong></p>
                <p class="text-muted">Silakan update informasi mahasiswa sesuai dengan data yang diperlukan.</p>
            </div>
            <div class="col-lg-8 card-form__body card-body">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="was-validated">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Nama" value="{{ $mahasiswa->nama }}" required>
                            @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" placeholder="NIM" value="{{ $mahasiswa->nim }}" required>
                            @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="fakultas">Fakultas</label>
                            <input type="text" class="form-control @error('fakultas') is-invalid @enderror" id="fakultas" name="fakultas" placeholder="Fakultas" value="{{ $mahasiswa->fakultas }}" required>
                            @error('fakultas')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan" placeholder="Jurusan" value="{{ $mahasiswa->jurusan }}" required>
                            @error('jurusan')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
