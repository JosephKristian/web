<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:admin,dosen,mahasiswa'],
        ]);

        if ($request->role === 'dosen') {
            $request->validate([
                'fakultas' => ['required', 'string', 'max:255'],
            ]);
        } elseif ($request->role === 'mahasiswa') {
            $request->validate([
                'nim' => ['required', 'string', 'max:255', 'unique:mahasiswa'],
                'fakultas' => ['required', 'string', 'max:255'],
                'jurusan' => ['required', 'string', 'max:255'],
            ]);
        }

        DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);

            if ($request->role === 'dosen') {
                Dosen::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'fakultas' => $request->fakultas,
                ]);
            } elseif ($request->role === 'mahasiswa') {
                Mahasiswa::create([
                    'name' => $request->name,
                    'nim' => $request->nim,
                    'email' => $request->email,
                    'fakultas' => $request->fakultas,
                    'jurusan' => $request->jurusan,
                ]);
            }

            event(new Registered($user));
            Auth::login($user);
        });

        return redirect()->route('dashboard');
    }
}
