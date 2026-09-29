<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\JenisPelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;

class PelangganController extends Controller
{

    public function index()
    {
        $pelanggans = Pelanggan::with('jenisPelanggan')
            ->latest()
            ->paginate(10);


        return view(
            'pelanggan.index',
            compact('pelanggans')
        );
    }


    public function create()
    {
        $jenisPelanggans = JenisPelanggan::all();


        return view(
            'pelanggan.create',
            compact('jenisPelanggans')
        );
    }


    public function store(StorePelangganRequest $request)
    {
        Pelanggan::create(
            $request->validated()
        );


        return redirect()
            ->route('pelanggan.index')
            ->with(
                'success',
                'Data pelanggan berhasil ditambahkan'
            );
    }


    public function edit(Pelanggan $pelanggan)
    {
        $jenisPelanggans = JenisPelanggan::all();


        return view(
            'pelanggan.edit',
            compact(
                'pelanggan',
                'jenisPelanggans'
            )
        );
    }


    public function update(
        UpdatePelangganRequest $request,
        Pelanggan $pelanggan
    ) {

        $pelanggan->update(
            $request->validated()
        );


        return redirect()
            ->route('pelanggan.index')
            ->with(
                'success',
                'Data pelanggan berhasil diperbarui'
            );
    }


    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();


        return redirect()
            ->route('pelanggan.index')
            ->with(
                'success',
                'Data pelanggan berhasil dihapus'
            );
    }
}