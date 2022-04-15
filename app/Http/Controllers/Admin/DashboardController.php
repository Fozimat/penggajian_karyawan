<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gaji;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $total_jabatan = Jabatan::count();
        $total_karyawan = Karyawan::count();
        $total_gaji = Gaji::count();
        return view('admin.dashboard.index', compact(['total_jabatan', 'total_karyawan', 'total_gaji']));
    }
}
