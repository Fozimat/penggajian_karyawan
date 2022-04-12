<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gaji;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('admin.laporan.index', compact(['karyawan']));
    }

    public function print_semua()
    {
        $gaji = Gaji::with(['jabatan', 'karyawan'])->get();
        $pdf = PDF::loadview('admin.laporan.print-semua', compact(['gaji']))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function print_per_karyawan(Request $request)
    {
        $id_karyawan = $request->id_karyawan;
        $gaji = Gaji::with(['jabatan', 'karyawan'])->where('id_karyawan', 'like', "%$id_karyawan%")->get();
        $pdf = PDF::loadview('admin.laporan.print-per-karyawan', compact(['gaji']))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}
