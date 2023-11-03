<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pinjaman;

class Log extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_anggota',
        'nama_lengkap',
        'level',
        'aktivitas',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pinjam(){
        return $this->belongsTo(Pinjaman::class, 'pinjam_id');
    }
}
