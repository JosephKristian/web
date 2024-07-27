@extends('layouts.lema')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Mahasiswa</h3>
            <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($mahasiswa->isEmpty())
                <div class="alert alert-info mt-3">Tidak ada data mahasiswa.</div>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Email</th>
                            <th>Fakultas</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $index => $mahasiswaItem)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $mahasiswaItem->nama }}</td>
                                <td>{{ $mahasiswaItem->nim }}</td>
                                <td>{{ $mahasiswaItem->email }}</td>
                                <td>{{ $mahasiswaItem->fakultas }}</td>
                                <td>{{ $mahasiswaItem->jurusan }}</td>
                                <td>
                                    <a href="{{ route('admin.mahasiswa.edit', $mahasiswaItem->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.mahasiswa.destroy', $mahasiswaItem->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
