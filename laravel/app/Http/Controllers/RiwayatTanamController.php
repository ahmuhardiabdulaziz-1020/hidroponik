<?php

namespace App\Http\Controllers;


use App\Models\RiwayatTanam;
use App\Models\BatchTanam;
use App\Models\Talang;

use App\Http\Requests\StoreRiwayatTanamRequest;
use App\Http\Requests\UpdateRiwayatTanamRequest;


class RiwayatTanamController extends Controller
{


    public function index()
    {
        $riwayatTanams = RiwayatTanam::with([
            'batch.varietas.sayur',
            'talang'
        ])
        ->latest('tanggal')
        ->paginate(10);


        return view(
            'riwayat_tanam.index',
            compact('riwayatTanams')
        );
    }



    public function create()
    {
        $batchTanams = BatchTanam::with(
            'varietas.sayur'
        )->get();


        $talangs = Talang::all();


        return view(
            'riwayat_tanam.create',
            compact(
                'batchTanams',
                'talangs'
            )
        );
    }



    public function store(StoreRiwayatTanamRequest $request)
    {
         
        
        RiwayatTanam::create(
            $request->validated()
        );


        return redirect()
            ->route('riwayat-tanam.index')
            ->with(
                'success',
                'Riwayat tanam berhasil ditambahkan'
            );

    }



    public function edit(RiwayatTanam $riwayatTanam)
    {

        $batchTanams = BatchTanam::with(
            'varietas.sayur'
        )->get();


        $talangs = Talang::all();


        return view(
            'riwayat_tanam.edit',
            compact(
                'riwayatTanam',
                'batchTanams',
                'talangs'
            )
        );

    }



    public function update(
        UpdateRiwayatTanamRequest $request,
        RiwayatTanam $riwayatTanam
)
{

        $riwayatTanam->update(
            $request->validated()
        );


        return redirect()
            ->route('riwayat-tanam.index')
            ->with(
                'success',
                'Riwayat tanam berhasil diperbarui'
            );

}

    public function show(BatchTanam $batch)
    {
    $riwayats = RiwayatTanam::with([
        'talang'
    ])
    ->where(
        'id_batch',
        $batch->id_batch
    )
    ->orderBy('tanggal')
    ->orderBy('id_riwtanam')
    ->get();


        return view(
            'riwayat_tanam.show',
            compact(
                'batch',
                'riwayats'
         )
        );
    }



    public function destroy(RiwayatTanam $riwayatTanam)
    {

        $riwayatTanam->delete();


        return redirect()
            ->route('riwayat-tanam.index')
            ->with(
                'success',
                'Riwayat tanam berhasil dihapus'
            );

    }

}