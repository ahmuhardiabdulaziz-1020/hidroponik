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
        Schema::create('harga_sayurs', function (Blueprint $table) {
            
            $table->id('id_harga');
            $table->foreignId('id_sayur')
                ->constrained(
                    'sayurs',
                    'id_sayur'
                )
                ->cascadeOnDelete();

            $table->foreignId('id_jenpelanggan')
                    ->constrained(
                        'jenis_pelanggans',
                        'id_jenpelanggan'
                    )
                    ->cascadeOnDelete();

            $table->decimal('harga', 12, 2);
            $table->string('satuan', 20);
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir')
                    ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('harga_sayurs');
    }
};
