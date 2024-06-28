@extends('layouts.lema')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Dosen</h3>
            <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Fakultas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dosen as $index => $dosen)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $dosen->nama }}</td>
                            <td>{{ $dosen->email }}</td>
                            <td>{{ $dosen->fakultas }}</td>
                            <td>
                                <a href="{{ route('admin.dosen.edit', $dosen->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.dosen.destroy', $dosen->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($dosen->isEmpty())
                <div class="alert alert-info mt-3">Tidak ada data dosen.</div>
            @endif
        </div>
    </div>
</div>
@endsection
