<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        return view('admin.dosen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosen,email|unique:users,email',
            'fakultas' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        DB::transaction(function () use ($request) {
            // Create user
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'dosen',
            ]);
    
            // Create dosen
            Dosen::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'fakultas' => $request->fakultas,
                'user_id' => $user->id,
            ]);
        });
    
        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
    }
    

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('admin.dosen.edit', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:dosen,email,' . $id . '|unique:users,email,' . $dosen->user_id,
            'fakultas' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($dosen->user_id);

        DB::transaction(function () use ($request, $dosen, $user) {
            // Update user
            $user->update([
                'name' => $request->nama,
                'email' => $request->email,
            ]);

            // Update dosen
            $dosen->update([
                'nama' => $request->nama,
                'email' => $request->email,
                'fakultas' => $request->fakultas,
            ]);
        });

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil diupdate');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $user = User::findOrFail($dosen->user_id);

        DB::transaction(function () use ($dosen, $user) {
            $dosen->delete();
            $user->delete();
        });

        return redirect()->route('admin.dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
