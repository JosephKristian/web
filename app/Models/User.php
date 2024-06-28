<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Dosen; 
use App\Models\Mahasiswa;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function dosen() {
        return $this->hasOne(Dosen::class);
    }

    public function mahasiswa() {
        return $this->hasOne(Mahasiswa::class);
    }
}
