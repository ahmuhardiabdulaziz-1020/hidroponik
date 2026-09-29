<?php

namespace App\Http\Controllers;

use App\Models\Talang;
use App\Http\Requests\StoreTalangRequest;
use App\Http\Requests\UpdateTalangRequest;

class TalangController extends Controller
{

    public function index()
    {
        $talangs = Talang::latest()
            ->paginate(10);

        return view(
            'talang.index',
            compact('talangs')
        );
    }


    public function create()
    {
        return view('talang.create');
    }


    public function store(StoreTalangRequest $request)
    {
        Talang::create(
            $request->validated()
        );

        return redirect()
            ->route('talang.index')
            ->with(
                'success',
                'Data talang berhasil ditambahkan'
            );
    }


    public function show(Talang $talang)
    {
        return view(
            'talang.show',
            compact('talang')
        );
    }


    public function edit(Talang $talang)
    {
        return view(
            'talang.edit',
            compact('talang')
        );
    }


    public function update(
        UpdateTalangRequest $request,
        Talang $talang
    ) {

        $talang->update(
            $request->validated()
        );


        return redirect()
            ->route('talang.index')
            ->with(
                'success',
                'Data talang berhasil diperbarui'
            );
    }


    public function destroy(Talang $talang)
    {
        $talang->delete();

        return redirect()
            ->route('talang.index')
            ->with(
                'success',
                'Data talang berhasil dihapus'
            );
    }
}
