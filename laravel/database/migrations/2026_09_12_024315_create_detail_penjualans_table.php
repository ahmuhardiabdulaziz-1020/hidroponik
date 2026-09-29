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
        Schema::create('detail_penjualans', function (Blueprint $table) {
            
            $table->id('id_detpenjualan');
            $table->foreignId('id_sayur')
                    ->constrained(
                        'sayurs',
                        'id_sayur'
                    )
                    ->cascadeOnDelete();

            $table->foreignId('id_penjualan')
                    ->constrained(
                        'penjualans',
                        'id_penjualan'
                    )
                    ->cascadeOnDelete();

            $table->decimal('jumlah', 10, 2);
            $table->string('satuan', 20);
            $table->decimal('harga_satuan', 12, 2);
            $table->decimal('subtotal', 12, 2);
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
        Schema::dropIfExists('detail_penjualans');
    }
};
