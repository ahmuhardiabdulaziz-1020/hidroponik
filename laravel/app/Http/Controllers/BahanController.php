<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Http\Requests\StoreBahanRequest;
use App\Http\Requests\UpdateBahanRequest;

class BahanController extends Controller
{

    public function index()
    {
        $bahans = Bahan::latest()
            ->paginate(10);

        return view(
            'bahan.index',
            compact('bahans')
        );
    }


    public function create()
    {
        return view('bahan.create');
    }


    public function store(StoreBahanRequest $request)
    {
        Bahan::create(
            $request->validated()
        );

        return redirect()
            ->route('bahan.index')
            ->with(
                'success',
                'Data bahan berhasil ditambahkan'
            );
    }


    public function show(Bahan $bahan)
    {
        return view(
            'bahan.show',
            compact('bahan')
        );
    }


    public function edit(Bahan $bahan)
    {
        return view(
            'bahan.edit',
            compact('bahan')
        );
    }


    public function update(
        UpdateBahanRequest $request,
        Bahan $bahan
    ) {

        $bahan->update(
            $request->validated()
        );


        return redirect()
            ->route('bahan.index')
            ->with(
                'success',
                'Data bahan berhasil diperbarui'
            );
    }


    public function destroy(Bahan $bahan)
    {
        $bahan->delete();


        return redirect()
            ->route('bahan.index')
            ->with(
                'success',
                'Data bahan berhasil dihapus'
            );
    }
}