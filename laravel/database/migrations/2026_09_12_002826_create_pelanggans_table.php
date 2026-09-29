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
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id('id_pelanggan');
            $table->foreignId('id_jenpelanggan')
                ->constrained(
                    'jenis_pelanggans',
                    'id_jenpelanggan'
                )
                ->cascadeOnDelete();

            $table->string('nama_pelanggan', 100);
            $table->string('no_hp', 20)
                ->nullable();
            $table->text('alamat')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
