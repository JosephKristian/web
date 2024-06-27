@extends('layouts.lema')

@section('content')
<div class="container">
    <h1>Pilih Tipe Data</h1>
    <div class="mb-3">
        <a href="{{ route('admin.dosen.index') }}" class="btn btn-primary">Daftar Dosen</a>
        <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-primary">Daftar Mahasiswa</a>
    </div>
    @if (isset($dosens))
        <h2>Daftar Dosen</h2>
        <a href="{{ route('admin.dosen.create') }}" class="btn btn-success">Tambah Dosen</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Fakultas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dosens as $dosen)
                    <tr>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>{{ $dosen->fakultas }}</td>
                        <td>
                            <a href="{{ route('admin.dosen.edit', $dosen->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif (isset($mahasiswas))
        <h2>Daftar Mahasiswa</h2>
        <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-success">Tambah Mahasiswa</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>Fakultas</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($mahasiswas as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ $mahasiswa->fakultas }}</td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                        <td>
                            <a href="{{ route('admin.mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
