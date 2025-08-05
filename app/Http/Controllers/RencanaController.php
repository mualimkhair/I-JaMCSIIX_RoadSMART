<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Models\Rencana;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Http\Requests\StoreRencanaRequest;
use App\Http\Requests\UpdateRencanaRequest;

class RencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/rencana/index', [
            'judul' => 'Menu rencana',
            'data_rencana' => Rencana::all()->sortByDesc(['presentase', 'nilai']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRencanaRequest $request)
    {
        // Ambil data kriteria
        $kriteria = Kriteria::all();
        $totalBobot = $kriteria->sum('bobot');
        // Normalisasi bobot
        $kriteria->each(function ($item) use ($totalBobot) {
            $item->bobot_normalisasi = $item->bobot / $totalBobot;
        });
        // Ambil data penilaian dan hitung nilai SMART
        $penilaian = Penilaian::with('jalan', 'kriteria')->get();
        // Proses normalisasi bobot dan hitung nilai SMART
        $hasilSMART = $penilaian
            ->groupBy('jalan_id')
            ->map(function ($penilaianPerJalan) use ($totalBobot) {
                $nilaiSMART = 0;
                foreach ($penilaianPerJalan as $penilaian) {
                    $bobotNormalisasi = $penilaian['kriteria']['bobot'] / $totalBobot;
                    $nilaiSMART += $penilaian['bobot'] * $bobotNormalisasi;
                }
                return [
                    'jalan_id' => $penilaianPerJalan[0]['jalan_id'],
                    'nama_jalan' => $penilaianPerJalan[0]['jalan']['nama_jalan'],
                    'nilai_smart' => $nilaiSMART,
                ];
            });
        // Hapus data rencana untuk jalan-jalan terkait
        $jalan_id = $hasilSMART->pluck('jalan_id')->toArray();
        Rencana::whereIn('jalan_id', $jalan_id)->delete();
        // Simpan data baru ke tabel rencana
        foreach ($hasilSMART as $data) {
            Rencana::create([
                'jalan_id' => $data['jalan_id'],
                'nilai' => $data['nilai_smart'],
                'presentase' => 0,
            ]);
        }
        // Rencana::create($request->all());
        return back()->with('berhasil', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rencana $rencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rencana $rencana)
    {
        return view('pages/rencana/index', [
            'judul' => 'Ubah Presentase',
            'rencana' => $rencana,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRencanaRequest $request, Rencana $rencana)
    {
        $rencana->update($request->except(['_method', '_token']));
        return redirect(route('rencana.index'))->with('berhasil', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rencana $rencana)
    {
        //
    }
}
