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
        Schema::create('riwayat_tanams', function (Blueprint $table) {
           
            $table->id('id_riwtanam');
            $table->foreignId('id_batch')
                    ->constrained(
                        'batch_tanams',
                        'id_batch'
                    )
                    ->cascadeOnDelete();

            $table->foreignId('id_talang')
                    ->constrained(
                        'talangs',
                        'id_talang'
                    )
                    ->cascadeOnDelete();

            $table->date('tanggal');
            $table->string('kegiatan', 100);
            $table->unsignedInteger('jumlah_tanaman');
            $table->string('kondisi', 100);
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
        Schema::dropIfExists('riwayat_tanams');
    }
};
