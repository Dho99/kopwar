<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Anggota;
use App\Models\Pinjaman;

class Angsuran extends Model
{
    use HasFactory;
    // public $table = 'angsurans';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $fillable = [
        'pinjam_id',
        'user_id',
        'terbayar',
        'anggota_id'
    ];



    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    public function pinjam(){
        return $this->belongsTo(Pinjaman::class, 'pinjam_id');
    }
}
