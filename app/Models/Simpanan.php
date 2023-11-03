<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\JenisSimpanan;

class Simpanan extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'user_id',
        'id_pengajuan',
        'kode_simpanan',
        'id_jenis_simpanan',
        'jumlah',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(){
        return $this->belongsTo(JenisSimpanan::class, 'id_jenis_simpanan');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

}
