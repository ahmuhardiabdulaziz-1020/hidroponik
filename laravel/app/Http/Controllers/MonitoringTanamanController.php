<?php

namespace App\Http\Controllers;

use App\Models\Talang;
use App\Services\PlantLifecycleService;

class MonitoringTanamanController extends Controller
{
    protected $lifecycleService;


    public function __construct(
        PlantLifecycleService $lifecycleService
    ) {
        $this->lifecycleService = $lifecycleService;
    }


    public function index()
    {
        $talangs = Talang::with([
            'riwayatTanams.batch.varietas.sayur'
        ])
        ->get();


        $monitoring = [];


        foreach ($talangs as $talang) {

            $riwayatTerakhir = $talang
                ->riwayatTanams()
                ->with([
                    'batch.varietas.sayur'
                ])
                ->latest('tanggal')
                ->latest('id_riwtanam')
                ->first();


            if (!$riwayatTerakhir) {
                continue;
            }


            $batch = $riwayatTerakhir->batch;


            if (!$batch) {
                continue;
            }


            $data = $this->lifecycleService
                ->calculate($batch);


            $data['kode_talang'] =
                $talang->kode_talang;

            $data['id_talang'] =
                $talang->id_talang;

            $data['tipe_talang'] =
                $talang->tipe_talang;

            $data['fase_talang'] =
                $talang->fase_tanaman;


            $monitoring[] = $data;
        }


        $summary = [
            'total_talang' =>
                count($monitoring),

            'total_tanaman' =>
                collect($monitoring)
                ->sum('jumlah_aktual'),

            'akan_panen' =>
                collect($monitoring)
                ->min('sisa_hari_panen'),
        ];


        return view(
            'monitoring.tanaman.index',
            compact(
                'monitoring',
                'summary'
            )
        );
    }

    public function show(Talang $talang)
    {
        $riwayatTerakhir = $talang
            ->riwayatTanams()
            ->with([
                'batch.varietas.sayur'
            ])
            ->latest('tanggal')
            ->latest('id_riwtanam')
            ->first();

        if (!$riwayatTerakhir) {
            abort(404);
        }

        $batch = $riwayatTerakhir->batch;

        $monitoring =
            $this->lifecycleService
            ->calculate($batch);

        $riwayatMonitoring =
            $talang
            ->monitoringTanamans()
            ->latest('tanggal_monitoring')
            ->get();


        return view(
            'monitoring.tanaman.show',
            compact(
                'monitoring',
                'talang',
                'riwayatTerakhir',
                'riwayatMonitoring'
                
            )
        );
    }
}