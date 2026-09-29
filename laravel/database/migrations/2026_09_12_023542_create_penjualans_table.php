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
        Schema::create('penjualans', function (Blueprint $table) {
            
            $table->id('id_penjualan');
            $table->string('kode_penjualan', 30)
                    ->unique();

            $table->foreignId('id_pelanggan')
                    ->nullable()
                    ->constrained(
                        'pelanggans',
                        'id_pelanggan'
                    )
                    ->nullOnDelete();

            $table->date('tanggal_penjualan');
            $table->decimal('total', 12, 2);
            $table->enum('status', [
                    'lunas',
                    'belum_lunas'
            ]);

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
        Schema::dropIfExists('penjualans');
    }
};
