<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormKaryawanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->isMethod('put')) {
            return [
                'nama_karyawan' => 'required|unique:karyawan,nik,' . $this->karyawan->id,
                'nik' => 'required',
                'id_jabatan' => 'required',
                'jenis_kelamin' => 'required',
                'telepon' => 'required|numeric|min:20',
                'alamat' => 'required|min:20',
                'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048'
            ];
        } else {
            return [
                'nama_karyawan' => 'required',
                'nik' => 'required|unique:karyawan,nik',
                'id_jabatan' => 'required',
                'jenis_kelamin' => 'required',
                'telepon' => 'required|numeric|min:20',
                'alamat' => 'required|min:20',
                'foto' => 'required|mimes:jpg,jpeg,png|max:2048'
            ];
        }
    }

    public function messages()
    {
        return [
            'nama_karyawan.required' => 'Nama karyawan tidak boleh kosong',
            'nik.required' => 'NIK tidak boleh kosong',
            'nik.unique' => 'NIK tidak boleh sama',
            'id_jabatan.required' => 'Jabatan tidak boleh kosong',
            'jenis_kelamin.required' => 'Jenis Kelamin tidak boleh kosong',
            'telepon.required' => 'Telepon tidak boleh kosong',
            'telepon.numeric' => 'Telepon harus angka',
            'telepon.min' => 'Telepon harus lebih dari 10 digit',
            'alamat.min' => 'Alamat harus lebih dari 20 karakter',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.mimes' => 'Ekstensi file harus jpg, jpeg, png',
            'foto.max' => 'Maksimal ukuran foto tidak boleh lebih dari 2 MB',
        ];
    }
}
