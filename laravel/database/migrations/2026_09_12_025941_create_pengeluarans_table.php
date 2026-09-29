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
        Schema::create('pengeluarans', function (Blueprint $table) {
           
            $table->id('id_pengeluaran');
            $table->date('tanggal');
            $table->string('kategori', 50);
            $table->text('keterangan')
                    ->nullable();
            $table->decimal('nominal', 12, 2);
            $table->string('metode_pembayaran', 30);
            $table->string('referensi', 100)
                    ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluarans');
    }
};
