@extends('layouts.lema')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Jadwal Sidang</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.jadwal.update', $jadwal->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $jadwal->tanggal }}" required>
                </div>
                <div class="mb-3">
                    <label for="dosen_id" class="form-label">Penguji</label>
                    <select class="form-control" id="dosen_id" name="dosen_id" required>
                        <option value="">Pilih Penguji</option>
                        @foreach ($dosen as $dosen)
                            <option value="{{ $dosen->id }}" {{ $jadwal->dosen_id == $dosen->id ? 'selected' : '' }}>{{ $dosen->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                    <select class="form-control" id="mahasiswa_id" name="mahasiswa_id" required>
                        <option value="">Pilih Mahasiswa</option>
                        @foreach ($mahasiswa as $mahasiswa)
                            <option value="{{ $mahasiswa->id }}" {{ $jadwal->mahasiswa_id == $mahasiswa->id ? 'selected' : '' }}>{{ $mahasiswa->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.jadwal.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#dosen_id, #mahasiswa_id').select2({
            placeholder: 'Pilih',
            allowClear: true
        });
    });
</script>
@endsection
