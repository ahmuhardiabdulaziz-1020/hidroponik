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
        Schema::create('sayurs', function (Blueprint $table) {
            $table->id('id_sayur');
            $table->string('kode_sayur', 20)->unique();
            $table->string('nama_sayur', 100);
            $table->integer('durasi_semai');
            $table->integer('durasi_remaja');
            $table->integer('durasi_panen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sayurs');
    }
};
