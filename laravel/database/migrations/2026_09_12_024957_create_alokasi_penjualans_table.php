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
        Schema::create('alokasi_penjualans', function (Blueprint $table) {
            
            $table->id('id_lokasi');
            $table->foreignId('id_detpenjualan')
                    ->constrained(
                        'detail_penjualans',
                        'id_detpenjualan'
                    )
                    ->cascadeOnDelete();

            $table->foreignId('id_panen')
                    ->nullable()
                    ->constrained(
                        'panens',
                        'id_panen'
                    )
                    ->nullOnDelete();

            $table->decimal('jumlah', 10, 2);
            $table->string('satuan', 20);
            $table->text('keterangan')
                    ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alokasi_penjualans');
    }
};
