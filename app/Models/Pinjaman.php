<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Angsuran;
use App\Models\Anggota;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjamans';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = [
        'kode_pinjaman',
        'user_id',
        'jumlah',
        'terbayar',
        'keterangan',
        'rencana_bayar',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function angsur(){
        return $this->hasMany(Angsuran::class, 'pinjam_id');
    }

    public function pinjam(){
        return $this->belongsTo(Pengajuan::class, 'pinjam_id');
    }

}
