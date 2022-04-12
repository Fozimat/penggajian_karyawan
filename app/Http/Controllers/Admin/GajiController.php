<?php

namespace App\Http\Controllers\admin;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gaji = Gaji::with(['jabatan', 'karyawan'])->get();
        return view('admin.gaji.index', compact(['gaji']));
    }

    public function print($id)
    {
        $hasil = Gaji::with(['jabatan', 'karyawan'])->where('id', $id)->first();
        $pdf = PDF::loadview('admin.gaji.print', compact(['hasil']))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function findJabatanGaji($id)
    {
        $karyawan = Karyawan::with(['jabatan'])->where('id', $id)->get();
        return response()->json($karyawan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        return view('admin.gaji.create', compact(['karyawan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'id_karyawan' => $request->id_karyawan,
            'bonus' => $request->bonus,
            'bulan_tahun' => $request->bulan_tahun,
            'total_gaji' => $request->total_gaji,
        ];
        Gaji::create($data);
        return redirect()->route('gaji.index')->with('flash', 'Gaji berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Gaji $gaji)
    {
        $karyawan = Karyawan::all();
        return view('admin.gaji.edit', compact(['gaji', 'karyawan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gaji $gaji)
    {
        $data = [
            'id_karyawan' => $request->id_karyawan,
            'bonus' => $request->bonus,
            'bulan_tahun' => $request->bulan_tahun,
            'total_gaji' => $request->total_gaji,
        ];
        $gaji->update($data);
        return redirect()->route('gaji.index')->with('flash', 'Gaji berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
        return redirect()->route('gaji.index')->with('flash', 'Gaji berhasil dihapus');
    }
}
