<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuans', function(Blueprint $table) {
            $table->id('id_pengajuan');
            $table->integer('user_id');
            $table->string('category', 50);
            $table->string('kode_pinjaman', 50)->nullable();
            $table->bigInteger('jumlah')->nullable();
            $table->bigInteger('rencana_bayar')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('periode')->nullable();
            $table->integer('id_jenis_simpanan')->nullable();
            $table->string('status',10)->default('Pending');
            $table->integer('pinjam_id')->nullable();
            $table->bigInteger('terbayar')->nullable();
            $table->string('kode_simpanan',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('pengajuans');
    }
};
