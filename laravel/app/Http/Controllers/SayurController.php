<?php

namespace App\Http\Controllers;

use App\Models\Sayur;
use App\Http\Requests\StoreSayurRequest;
use App\Http\Requests\UpdateSayurRequest;

class SayurController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sayurs = Sayur::latest()
            ->paginate(10);

        return view(
            'sayur.index',
            compact('sayurs')
        );
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sayur.create');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSayurRequest $request)
    {
        Sayur::create(
            $request->validated()
        );


        return redirect()
            ->route('sayur.index')
            ->with(
                'success',
                'Data sayur berhasil ditambahkan'
            );
    }



    /**
     * Display the specified resource.
     */
    public function show(Sayur $sayur)
    {
        return view(
            'sayur.show',
            compact('sayur')
        );
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sayur $sayur)
    {
        return view(
            'sayur.edit',
            compact('sayur')
        );
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(
        UpdateSayurRequest $request,
        Sayur $sayur
    ) {

        $sayur->update(
            $request->validated()
        );


        return redirect()
            ->route('sayur.index')
            ->with(
                'success',
                'Data sayur berhasil diperbarui'
            );
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sayur $sayur)
    {

        $sayur->delete();


        return redirect()
            ->route('sayur.index')
            ->with(
                'success',
                'Data sayur berhasil dihapus'
            );
    }

}