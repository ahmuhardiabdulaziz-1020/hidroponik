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
        Schema::create('varietas', function (Blueprint $table) {
            $table->id('id_varietas');
            $table->foreignId('id_sayur')
                    ->constrained('sayurs','id_sayur')
                    ->cascadeOnDelete();
            $table->string('nama_varietas', 100);
            $table->decimal('est_bobot', 8, 2);
            $table->string('satuan_bobot', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('varietas');
    }
};
