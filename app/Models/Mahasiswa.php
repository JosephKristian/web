<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa'; // pastikan ini sudah benar

    protected $fillable = [
        'nama',
        'nim',
        'email',
        'fakultas',
        'jurusan',
        'user_id', // tambahkan user_id ke fillable
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
