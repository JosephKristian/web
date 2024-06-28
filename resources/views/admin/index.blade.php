@extends('layouts.lema')

@section('content')
<div class="container">
    <h1>Pilih Tipe Data</h1>
    <div class="mb-3">
        <a href="{{ route('admin.dosen.index') }}" class="btn btn-primary">Daftar Dosen</a>
        <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-primary">Daftar Mahasiswa</a>
    </div>
</div>
@endsection
