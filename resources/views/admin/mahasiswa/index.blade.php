
@extends('layouts.lema')

@section('content')
<div class="container">
    <h1>Daftar Mahasiswa</h1>

    <a href="{{ route('admin.index') }}" class="btn btn-secondary">
        <span class="material-icons">arrow_back</span>
    </a>
    
    <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nim</th>
                <th>Email</th>
                <th>fakultas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswa as $mahasiswa)
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
</div>
@endsection
