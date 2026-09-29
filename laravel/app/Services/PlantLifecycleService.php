<?php

namespace App\Services;

use Carbon\Carbon;

class PlantLifecycleService
{
    public function calculate($batch)
    {
        $sayur = $batch
            ->varietas
            ->sayur;


        $tanggalMulai = Carbon::parse(
            $batch->tanggal_tanam
        );


        $hariBerjalan = $tanggalMulai->diffInDays(
            Carbon::today()
        );


        /*
        |--------------------------------------------------------------------------
        | Prediksi fase berdasarkan umur tanaman
        |--------------------------------------------------------------------------
        */

        if ($hariBerjalan < $sayur->durasi_semai) {

            $fasePrediksi = 'semai';

        } elseif (
            $hariBerjalan <
            (
                $sayur->durasi_semai +
                $sayur->durasi_remaja
            )
        ) {

            $fasePrediksi = 'remaja';

        } else {

            $fasePrediksi = 'dewasa';

        }



        /*
        |--------------------------------------------------------------------------
        | Prediksi panen
        |--------------------------------------------------------------------------
        */

        $tanggalPanen = $tanggalMulai
            ->copy()
            ->addDays(
                $sayur->durasi_panen
            );


        $sisaPanen = Carbon::today()
            ->diffInDays(
                $tanggalPanen,
                false
            );


        if ($sisaPanen < 0) {
            $sisaPanen = 0;
        }



        /*
        |--------------------------------------------------------------------------
        | Ambil fase aktual dari talang terakhir
        |--------------------------------------------------------------------------
        */

        $riwayatTerakhir = $batch
            ->riwayatTanams()
            ->with('talang')
            ->latest('tanggal')
            ->first();


        $faseAktual = null;


        if ($riwayatTerakhir && $riwayatTerakhir->talang) {

            $faseAktual =
                $riwayatTerakhir
                ->talang
                ->fase_tanaman;

        }



  /*
|--------------------------------------------------------------------------
| Status kondisi
|--------------------------------------------------------------------------
*/

    if (!$faseAktual) {

        $status = 'belum_ada_data';

        $statusLabel = 'Belum Ada Data';

        $statusLevel = 'secondary';


    } elseif ($fasePrediksi == $faseAktual) {

        $status = 'sesuai';

        $statusLabel = 'Normal';

        $statusLevel = 'success';


    } elseif (
        $fasePrediksi == 'dewasa'
        &&
        $faseAktual == 'remaja'
    ) {

        $status = 'terlambat_pindah_fase';

        $statusLabel = 'Perlu Perhatian';

        $statusLevel = 'warning';


    } else {
        $status = 'perlu_perhatian';

        $statusLabel = 'Periksa Tanaman';

        $statusLevel = 'danger';



        }
        $durasiSemai = $sayur->durasi_semai;

        $durasiRemaja = 
            $sayur->durasi_semai +
            $sayur->durasi_remaja;

        $totalLifecycle =
            $sayur->durasi_panen;

        $totalHari =
        $sayur->durasi_panen;


        $progress =
        round(
        ($hariBerjalan / $totalHari) * 100
    );


        if ($progress > 100) {
        $progress = 100;
    }

    return [

        'kode_batch' => $batch->kode_batch,

        'nama_sayur' => $sayur->nama_sayur,

        'nama_varietas' =>
            $batch->varietas->nama_varietas,


        'jumlah_tanam' =>
            $batch->jumlah_tanam,


        'jumlah_aktual' =>
            $riwayatTerakhir
            ? $riwayatTerakhir->jumlah_tanaman
            : $batch->jumlah_tanam,


        'kode_talang' =>
            $riwayatTerakhir?->talang?->kode_talang,


        'tipe_talang' =>
            $riwayatTerakhir?->talang?->tipe_talang,


        'umur_hari' =>
            $hariBerjalan,


        'progress' =>
            $progress,


        'prediksi_fase' =>
            $fasePrediksi,


        'fase_aktual' =>
            $faseAktual,


        'status' =>
            $status,
        'status_label' =>
            $statusLabel,

        'status_level' =>
            $statusLevel,


        'tanggal_prediksi_panen'
            => $tanggalPanen->format('Y-m-d'),


        'sisa_hari_panen'
            => $sisaPanen,


        'riwayat_terakhir'
            => $riwayatTerakhir,
        
        'riwayat'
            => $batch
                ->riwayatTanams()
                ->with('talang')
                ->latest('tanggal')
                ->get(),
        'lifecycle' => [

            'semai' => [
                'mulai' => 0,
                'akhir' => $durasiSemai,
            ],

            'remaja' => [
                'mulai' => $durasiSemai,
                'akhir' => $durasiRemaja,
            ],

            'panen' => [
                'mulai' => $durasiRemaja,
                'akhir' => $totalLifecycle,
            ],

        ],

        ];
    }
}