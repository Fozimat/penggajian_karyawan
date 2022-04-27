<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::all();
        $tahun = Gaji::selectRaw('YEAR(bulan_tahun) as tahun')->distinct()->orderByRaw('YEAR(bulan_tahun) asc')->get();
        $jabatan = Jabatan::all();
        return view('admin.laporan.index', compact(['karyawan', 'tahun', 'jabatan']));
    }

    public function print_semua()
    {
        $gaji = Gaji::with(['jabatan', 'karyawan'])->get();
        $pdf = PDF::loadview('admin.laporan.print-semua', compact(['gaji']))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function print_karyawan()
    {
        $karyawan = Karyawan::all();
        $pdf = PDF::loadview('admin.laporan.print-karyawan', compact(['karyawan']))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function print_per_karyawan(Request $request)
    {
        $id_karyawan = $request->id_karyawan;
        $tahun = $request->tahun;
        $gaji = Gaji::with(['jabatan', 'karyawan'])->where('id_karyawan', 'like', "%$id_karyawan%")->where('bulan_tahun', 'like', "%$tahun%")->get();
        $pdf = PDF::loadview('admin.laporan.print-per-karyawan', compact(['gaji']))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }

    public function print_per_jabatan(Request $request)
    {
        $id_jabatan = $request->id_jabatan;
        $bulan_tahun = $request->bulan_tahun;
        $gaji = Gaji::with(['jabatan', 'karyawan'])->where('id_jabatan', 'like', "%$id_jabatan%")->where('bulan_tahun', 'like', "%$bulan_tahun%")->get();
        $pdf = PDF::loadview('admin.laporan.print-per-jabatan', compact(['gaji']))->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
}
