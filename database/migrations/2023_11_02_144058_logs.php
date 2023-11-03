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
        Schema::create('logs', function(Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap', 100);
            $table->string('kode_anggota', 50);
            $table->string('aktivitas', 100);
            $table->string('level', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('logs');
    }
};
