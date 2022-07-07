<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormKaryawanRequest;
use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = Karyawan::all();
        return view('admin.karyawan.index', compact(['karyawan']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('admin.karyawan.create', compact(['jabatan']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormKaryawanRequest $request)
    {
        $foto = $request->file('foto');
        $nama_foto = $request->nama_karyawan . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('foto'), $nama_foto);
        $data = [
            'nama_karyawan' => $request->nama_karyawan,
            'nik' => $request->nik,
            'id_jabatan' => $request->id_jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'foto' => $nama_foto,
        ];
        Karyawan::create($data);
        return redirect()->route('karyawan.index')->with('flash', 'Data Karyawan berhasil ditambahkan');
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
    public function edit($id)
    {
        $jabatan = Jabatan::all();
        $karyawan = Karyawan::findOrFail($id);

        return view('admin.karyawan.edit', compact(['jabatan', 'karyawan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FormKaryawanRequest $request, Karyawan $karyawan)
    {
        $data = [
            'nama_karyawan' => $request->nama_karyawan,
            'nik' => $request->nik,
            'id_jabatan' => $request->id_jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ];
        if ($request->hasFile('foto')) {
            $path = public_path('foto/' . $karyawan->nama_karyawan);
            if (File::exists($path)) {
                File::delete($path);
            }
            $new_foto = $request->file('foto');
            $nama_foto = $request->nama_karyawan . '.' . $new_foto->getClientOriginalExtension();
            $new_foto->move(public_path('foto'), $nama_foto);
            $data['foto'] = $nama_foto;
        } else {
            $data['foto'] = $request->old_foto;
        }
        $karyawan->update($data);
        return redirect()->route('karyawan.index')->with('flash', 'Data Karyawan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->gaji()->delete();

        $path = public_path('foto/' . $karyawan->foto);
        if (File::exists($path)) {
            File::delete($path);
        }
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with('flash', 'Data Karyawan berhasil dihapus');
    }
}
