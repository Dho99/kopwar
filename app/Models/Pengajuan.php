<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Pinjaman;
use App\Models\Angsuran;
use App\Models\Simpanan;

class Pengajuan extends Model
{
    use HasFactory;
    // public $table = 'pengajuans';
    protected $primaryKey = 'id_pengajuan';
    protected $fillable = [
        'user_id',
        'category',
        'jumlah',
        'kode_pinjaman',
        'id_jenis_simpanan',
        'rencana_bayar',
        'keterangan',
        'terbayar',
        'periode',
        'anggota_id',
        'pinjam_id',
        'kode_anggota',
        'username',
        'password',
        'status_aktif',
        'level',
        'nama_lengkap',
        'kode_simpanan',
    ];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function simpan(){
        return $this->belongsTo(JenisSimpanan::class, 'id_jenis_simpanan');
    }

    public function pinjam(){
        return $this->belongsTo(Pinjaman::class, 'pinjam_id');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function angsur(){
        return $this->belongsTo(Angsuran::class, 'id');
    }
}
