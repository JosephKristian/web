<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin.mahasiswa.create');
    }

    public function store(Request $request)
    {
        // Log request data
        Log::info('Update request data: ', $request->all());

        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim',
            'email' => 'required|email|unique:mahasiswa,email',
            'fakultas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('admin.mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim,' . $id,
            'email' => 'required|email|unique:mahasiswa,email,' . $id,
            'fakultas' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        Log::info('Mahasiswa sebelum update: ', $mahasiswa->toArray());

        $mahasiswa->update($request->all());

        // Log request data
        Log::info('Update request data: ', $request->all());

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil diupdate');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
