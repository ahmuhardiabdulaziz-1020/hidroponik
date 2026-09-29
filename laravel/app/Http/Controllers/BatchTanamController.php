<?php

namespace App\Http\Controllers;


use App\Models\BatchTanam;
use App\Models\Varietas;
use App\Http\Requests\StoreBatchTanamRequest;
use App\Http\Requests\UpdateBatchTanamRequest;



class BatchTanamController extends Controller
{

    public function index()
    {
        $batchTanams = BatchTanam::with('varietas.sayur')
            ->latest()
            ->paginate(10);

        return view(
            'batch_tanam.index',
            compact('batchTanams')
        );
    }



    public function create()
    {
        $varietas = Varietas::with('sayur')
         ->orderBy('nama_varietas')
         ->get();

        return view(
            'batch_tanam.create',
            compact('varietas')
        );
    }

    public function store(StoreBatchTanamRequest $request)
    {

        BatchTanam::create(
            $request->validated()
        );


        return redirect()
            ->route('batch-tanam.index')
            ->with(
                'success',
                'Batch tanam berhasil dibuat'
            );

    }



    public function edit(BatchTanam $batchTanam)
    {
        $varietas = Varietas::with('sayur')
            ->orderBy('nama_varietas')
            ->get();

        return view(
            'batch_tanam.edit',
            compact(
                'batchTanam',
                'varietas'
            )
        );
    }



    public function update(
        UpdateBatchTanamRequest $request,
        BatchTanam $batchTanam
    )
    {

        $batchTanam->update(
            $request->validated()
        );


        return redirect()
            ->route('batch-tanam.index')
            ->with(
                'success',
                'Batch tanam diperbarui'
            );

    }



    public function destroy(BatchTanam $batchTanam)
    {

        $batchTanam->delete();


        return redirect()
            ->route('batch-tanam.index')
            ->with(
                'success',
                'Batch tanam dihapus'
            );

    }

}