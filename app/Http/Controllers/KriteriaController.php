<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Http\Requests\StoreKriteriaRequest;
use App\Http\Requests\UpdateKriteriaRequest;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/kriteria/index', [
            'judul' => 'Menu Kriteria',
            'data_kriteria' => Kriteria::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/kriteria/index', [
            'judul' => 'Tambah Daftar Kriteria',
            'kriteria' => new kriteria,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKriteriaRequest $request)
    {
        Kriteria::create($request->all());
        return back()->with('berhasil', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kriteria $kriteria)
    {
        return view('pages/kriteria/index', [
            'judul' => 'Ubah Daftar Kriteria - ' . $kriteria->nama_kriteria,
            'kriteria' => $kriteria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKriteriaRequest $request, Kriteria $kriteria)
    {
        $kriteria->update($request->except(['_method', '_token']));
        return redirect(route('kriteria.index'))->with('berhasil', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kriteria $kriteria)
    {
        $kriteria->destroy($kriteria->id);
        return back()->with('berhasil', 'Data berhasil dihapus');
    }
}
