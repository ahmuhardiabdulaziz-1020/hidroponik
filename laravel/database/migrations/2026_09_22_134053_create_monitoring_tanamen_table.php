<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('monitoring_tanamen', function (Blueprint $table) {

            $table->id('id_monitoring');

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


            // waktu pemeriksaan
            $table->date('tanggal_monitoring');


            // kondisi tanaman
            $table->unsignedInteger('jumlah_hidup')
                ->default(0);

            $table->unsignedInteger('jumlah_mati')
                ->default(0);


            // perkembangan tanaman
            $table->decimal(
                'tinggi_tanaman',
                5,
                2
            )
            ->nullable();

            $table->unsignedInteger(
                'jumlah_daun'
            )
            ->nullable();


            // parameter hidroponik
            $table->decimal(
                'ph_air',
                3,
                2
            )
            ->nullable();

            $table->decimal(
                'ec_air',
                5,
                2
            )
            ->nullable();

            $table->decimal(
                'suhu_air',
                5,
                2
            )
            ->nullable();


            // kondisi lapangan
            $table->enum('kondisi', [
                'normal',
                'perhatian',
                'bermasalah'
            ])
            ->default('normal');


            $table->text('catatan')
                ->nullable();


            $table->string('foto')
                ->nullable();


    $table->timestamps();
            });
        }


        public function down(): void
        {
            Schema::dropIfExists('monitoring_tanamen');
        }
};
