<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSimpanan extends Model
{
    use HasFactory;
    public $table = 'jenis_simpanan';
    protected $primaryKey = 'id_jenis_simpanan';
    protected $guarded = ['id_jenis_simpanan'];
    protected $fillable = [
        'jenis_simpanan'
    ];
}
