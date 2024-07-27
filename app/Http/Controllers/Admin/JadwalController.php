<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::with(['dosen', 'mahasiswa'])->get(); // Pastikan ini mengembalikan koleksi
        return view('admin.jadwal.index', compact('jadwal'));
    }
    

    public function create()
    {
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::doesntHave('jadwal')->get(); // Mahasiswa yang belum memiliki jadwal
    
        return view('admin.jadwal.create', compact('dosen', 'mahasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'dosen_id' => 'required|exists:dosen,id', // Pastikan nama tabel di sini benar
            'mahasiswa_id' => 'required|exists:mahasiswa,id', // Pastikan nama tabel di sini benar
        ]);

        Log::info($request->all());

        Jadwal::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal sidang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $dosen = Dosen::all();
        $mahasiswa = Mahasiswa::doesntHave('jadwal')->get();
        return view('admin.jadwal.edit', compact('jadwal', 'dosen', 'mahasiswa'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'dosen_id' => 'required|exists:dosen,id',
            'mahasiswa_id' => 'required|exists:mahasiswa,id',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal sidang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal sidang berhasil dihapus.');
    }
}
