<?php

use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    $userRole = auth()->user()->role;

    if ($userRole == 'admin') {
        return view('dashboardadmin');
    } elseif ($userRole == 'dosen') {
        return view('dashboarddosen');
    } else {
        return view('dashboardmahasiswa');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//master data

Route::get('/masterdata', [DashboardController::class, 'index'])->name('admin.index');

// Dosen
Route::get('/daftar-dosen', [DosenController::class, 'index'])->name('admin.dosen.index');

// mahasiswa
Route::get('/daftar-mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');


// Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//     Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.dashboard');
//     Route::resource('mahasiswa', 'App\Http\Controllers\Admin\MahasiswaController');
//     Route::resource('dosen', 'App\Http\Controllers\Admin\DosenController');
// });



require __DIR__.'/auth.php';
