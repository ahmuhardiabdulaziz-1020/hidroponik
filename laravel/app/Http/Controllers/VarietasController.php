<?php

namespace App\Http\Controllers;

use App\Models\Varietas;
use App\Models\Sayur;
use App\Http\Requests\StoreVarietasRequest;
use App\Http\Requests\UpdateVarietasRequest;

class VarietasController extends Controller
{
    public function index()
    {
        $varietas = Varietas::with('sayur')
            ->latest()
            ->paginate(10);

        return view(
            'varietas.index',
            compact('varietas')
        );
    }


    public function create()
    {
        $sayurs = Sayur::all();

        return view(
            'varietas.create',
            compact('sayurs')
        );
    }


    public function store(StoreVarietasRequest $request)
    {
        Varietas::create(
            $request->validated()
        );

        return redirect()
            ->route('varietas.index')
            ->with(
                'success',
                'Data varietas berhasil ditambahkan'
            );
    }


    public function show(Varietas $varietas)
    {
        return view(
            'varietas.show',
            compact('varietas')
        );
    }


    public function edit(Varietas $varietas)
    {
        $sayurs = Sayur::all();

        return view(
            'varietas.edit',
            compact(
                'varietas',
                'sayurs'
            )
        );
    }


    public function update(
        UpdateVarietasRequest $request,
        Varietas $varietas
    ) {
        $varietas->update(
            $request->validated()
        );

        return redirect()
            ->route('varietas.index')
            ->with(
                'success',
                'Data varietas berhasil diperbarui'
            );
    }


    public function destroy(Varietas $varietas)
    {
        $varietas->delete();

        return redirect()
            ->route('varietas.index')
            ->with(
                'success',
                'Data varietas berhasil dihapus'
            );
    }
}