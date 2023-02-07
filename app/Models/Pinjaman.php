<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    public $table = 'tbl_pinjaman';
    protected $primaryKey = 'pinjaman_id';
    protected $guarded = ['pinjaman_id'];
    public $timestamps = false;

}
