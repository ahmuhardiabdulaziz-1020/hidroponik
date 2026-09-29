<?php

namespace App\Http\Controllers;

use App\Models\JenisPelanggan;
use App\Http\Requests\StoreJenisPelangganRequest;
use App\Http\Requests\UpdateJenisPelangganRequest;

class JenisPelangganController extends Controller
{

    public function index()
    {
        $jenisPelanggans = JenisPelanggan::latest()
            ->paginate(10);

        return view(
            'jenis_pelanggan.index',
            compact('jenisPelanggans')
        );
    }


    public function create()
    {
        return view('jenis_pelanggan.create');
    }


    public function store(StoreJenisPelangganRequest $request)
    {
        JenisPelanggan::create(
            $request->validated()
        );

        return redirect()
            ->route('jenis-pelanggan.index')
            ->with(
                'success',
                'Jenis pelanggan berhasil ditambahkan'
            );
    }


    public function show(JenisPelanggan $jenisPelanggan)
    {
        return view(
            'jenis_pelanggan.show',
            compact('jenisPelanggan')
        );
    }


    public function edit(JenisPelanggan $jenisPelanggan)
    {
        return view(
            'jenis_pelanggan.edit',
            compact('jenisPelanggan')
        );
    }


    public function update(
        UpdateJenisPelangganRequest $request,
        JenisPelanggan $jenisPelanggan
    ) {

        $jenisPelanggan->update(
            $request->validated()
        );


        return redirect()
            ->route('jenis-pelanggan.index')
            ->with(
                'success',
                'Jenis pelanggan berhasil diperbarui'
            );
    }


    public function destroy(JenisPelanggan $jenisPelanggan)
    {
        $jenisPelanggan->delete();

        return redirect()
            ->route('jenis-pelanggan.index')
            ->with(
                'success',
                'Jenis pelanggan berhasil dihapus'
            );
    }
}
