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
        Schema::create('bahans', function (Blueprint $table) {
            $table->id('id_bahan');
            $table->string('kode_bahan', 20)
                    ->unique();
            $table->string('nama_bahan', 100);
            $table->enum('jenis_bahan', [
                'benih',
                'rockwool',
                'nutrisi',
                'disinfektan',
                'lainnya'
            ]);

            $table->string('satuan_bahan', 20);
            $table->decimal('stok', 10, 2)
                    ->default(0);
            $table->decimal('stok_minimum', 10, 2)
                    ->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahans');
    }
};
