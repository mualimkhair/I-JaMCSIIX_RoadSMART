<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Http\Requests\StorePenilaianRequest;
use App\Http\Requests\UpdatePenilaianRequest;

class PenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/penilaian/index', [
            'judul' => 'Menu penilaian',
            'data_penilaian' => Jalan::whereHas('penilaian')->with(['penilaian.kriteria'])->get(),
            'list_kriteria_id' => Kriteria::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/penilaian/index', [
            'judul' => 'Tambah Daftar Penilaian',
            'penilaian' => new Penilaian,
            'list_jalan_id' => Jalan::all(),
            'list_kriteria_id' => Kriteria::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePenilaianRequest $request)
    {
        foreach ($request->bobot as $kriteria_id => $bobot) {
            Penilaian::create([
                'jalan_id' => $request->jalan_id,
                'kriteria_id' => $kriteria_id,
                'bobot' => $bobot,
            ]);
        }
        return back()->with('berhasil', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jalan $jalan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jalan $jalan)
    {
        return view('pages/penilaian/index', [
            'judul' => 'Ubah Daftar Penilaian - ' . $jalan->nama_jalan,
            'penilaian' => $jalan,
            'list_jalan_id' => Jalan::all(),
            'list_kriteria_id' => Kriteria::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePenilaianRequest $request, Jalan $jalan)
    {
        $jalan->update($request->except(['_method', '_token', 'bobot']));
        foreach ($request->bobot as $kriteria_id => $bobot) {
            Penilaian::updateOrCreate(
                [
                    'jalan_id' => $jalan->id,
                    'kriteria_id' => $kriteria_id,
                ],
                [
                    'bobot' => $bobot,
                ]
            );
        }
        return redirect(route('penilaian.index'))->with('berhasil', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jalan $jalan)
    {
        Penilaian::where('jalan_id', $jalan->id)->delete();
        return back()->with('berhasil', 'Data berhasil dihapus');
    }
}
