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
        Schema::create('panens', function (Blueprint $table) {
            
            $table->id('id_panen');
            $table->foreignId('id_batch')
                    ->constrained(
                    'batch_tanams',
                    'id_batch'
                    )
                    ->cascadeOnDelete();

            $table->date('tanggal_panen');
            $table->unsignedInteger('jumlah_tanaman');
            $table->decimal('berat_panen', 10, 2);
            $table->string('satuan_berat', 20);
            $table->enum('kualitas', [
                    'baik',
                    'sedang',
                    'kurang'
            ]);

            $table->text('catatan')
                    ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panens');
    }
};
