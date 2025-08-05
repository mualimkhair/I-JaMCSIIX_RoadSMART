<?php

namespace App\Http\Controllers;

use App\Models\Jalan;
use App\Http\Requests\StoreJalanRequest;
use App\Http\Requests\UpdateJalanRequest;

use function PHPUnit\Framework\isNull;

class JalanController extends Controller
{
    private function listStatus()
    {
        return [
            'Baik',
            'Rusak',
            'Sedang Diperbaiki',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/jalan/index', [
            'judul' => 'Menu Jalan',
            'data_jalan' => Jalan::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/jalan/index', [
            'judul' => 'Tambah Daftar Jalan',
            'jalan' => new Jalan,
            'list_status' => $this->listStatus(),
            'latitude' => '-6.175110',
            'longitude' => '106.865036',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreJalanRequest $request)
    {
        Jalan::create($request->all());
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
        $lokasi = json_decode($jalan->lokasi, true);
        $latitude = $lokasi[0][0];
        $longitude = $lokasi[0][1];
        return view('pages/jalan/index', [
            'judul' => 'Ubah Daftar Jalan - ' . $jalan->nama_jalan,
            'jalan' => $jalan,
            'list_status' => $this->listStatus(),
            'latitude' => $latitude,
            'longitude' => $longitude,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJalanRequest $request, Jalan $jalan)
    {
        $data = $request->except(['_method', '_token']);
        if ($data['lokasi'] === "[]") {
            $data['lokasi'] = $jalan->lokasi;
            $data['panjang'] = $jalan->panjang;
        }
        $jalan->update($data);
        return redirect(route('jalan.index'))->with('berhasil', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jalan $jalan)
    {
        $jalan->destroy($jalan->id);
        return back()->with('berhasil', 'Data berhasil dihapus');
    }
}
