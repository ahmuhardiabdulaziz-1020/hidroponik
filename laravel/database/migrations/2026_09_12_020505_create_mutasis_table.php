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
        Schema::create('mutasis', function (Blueprint $table) {
            
            $table->id('id_mutasi');
            $table->foreignId('id_bahan')
                    ->constrained(
                        'bahans',
                        'id_bahan'
                    )
                    ->cascadeOnDelete();

            $table->date('tanggal');
            $table->enum('jenis_mutasi', [
                    'masuk',
                    'keluar'
            ]);

            $table->decimal('jumlah', 10, 2);
            $table->decimal('stok_sebelum', 10, 2);
            $table->decimal('stok_sesudah', 10, 2);
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
        Schema::dropIfExists('mutasis');
    }
};
