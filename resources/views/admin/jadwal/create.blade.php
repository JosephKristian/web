@extends('layouts.lema')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Tambah Jadwal Sidang</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.jadwal.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="mb-3">
                        <label for="dosen_id" class="form-label">Penguji</label> <!-- name updated to dosen_id -->
                        <select class="form-control" id="dosen_id" name="dosen_id" required>
                            <option value="">Pilih Penguji</option>
                            @foreach ($dosen as $d)
                                <option value="{{ $d->id }}">{{ $d->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="mahasiswa_id" class="form-label">Mahasiswa</label> <!-- name updated to mahasiswa_id -->
                        <select class="form-control" id="mahasiswa_id" name="mahasiswa_id" required>
                            <option value="">Pilih Mahasiswa</option>
                            @foreach ($mahasiswa as $m)
                                <option value="{{ $m->id }}">{{ $m->nama }}</option>
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
            $('#penguji, #mahasiswa').select2({
                placeholder: 'Pilih',
                allowClear: true
            });
        });
    </script>
@endsection
