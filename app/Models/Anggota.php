<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $primaryKey = 'anggota_id';
    protected $guarded = ['anggota_id'];
    // protected $table = ['users'];

    protected $fillable = [
        'kode_anggota',
        'username',
        'password',
        'status',
        // 'level',
        'nama_lengkap',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
