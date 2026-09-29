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
        Schema::create('batch_tanams', function (Blueprint $table) {
            $table->id('id_batch');
            $table->string('kode_batch', 30)
                    ->unique();
            $table->foreignId('id_varietas')
                    ->constrained(
                        'varietas',
                        'id_varietas'
                    )
                    ->cascadeOnDelete();
            $table->date('tanggal_tanam');
            $table->unsignedInteger('jumlah_tanam');
            $table->enum('status', [
                'direncanakan',
                'berjalan',
                'selesai',
                'gagal'
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
        Schema::dropIfExists('batch_tanams');
    }
};
