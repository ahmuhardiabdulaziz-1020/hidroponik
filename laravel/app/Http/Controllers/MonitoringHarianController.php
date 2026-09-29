<?php

namespace App\Http\Controllers;

use App\Models\Talang;
use App\Models\BatchTanam;
use App\Models\MonitoringTanaman;
use Illuminate\Http\Request;

class MonitoringHarianController extends Controller
{

    public function create(Talang $talang)
    {
        $riwayatTerakhir = $talang
            ->riwayatTanams()
            ->with('batch')
            ->latest('tanggal')
            ->latest('id_riwtanam')
            ->first();


        if (!$riwayatTerakhir) {
            abort(404);
        }


        return view(
            'monitoring.tanaman.create',
            compact(
                'talang',
                'riwayatTerakhir'
            )
        );
    }



    public function store(Request $request)
    {

        $request->validate([

            'id_batch' =>
                'required',

            'id_talang' =>
                'required',

            'tanggal_monitoring' =>
                'required|date',

            'jumlah_hidup' =>
                'required|integer',

            'jumlah_mati' =>
                'required|integer',

            'kondisi' =>
                'required'

        ]);



        MonitoringTanaman::create([

            'id_batch' =>
                $request->id_batch,

            'id_talang' =>
                $request->id_talang,

            'tanggal_monitoring' =>
                $request->tanggal_monitoring,

            'jumlah_hidup' =>
                $request->jumlah_hidup,

            'jumlah_mati' =>
                $request->jumlah_mati,

            'tinggi_tanaman' =>
                $request->tinggi_tanaman,

            'jumlah_daun' =>
                $request->jumlah_daun,

            'ph_air' =>
                $request->ph_air,

            'ec_air' =>
                $request->ec_air,

            'suhu_air' =>
                $request->suhu_air,

            'kondisi' =>
                $request->kondisi,

            'catatan' =>
                $request->catatan,

        ]);


        return redirect()
            ->route(
                'monitoring.tanaman.show',
                $request->id_talang
            )
            ->with(
                'success',
                'Monitoring berhasil disimpan'
            );

    }

}