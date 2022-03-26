<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormJabatanRquest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return [
            'nama_jabatan' => 'required',
            'gaji_perbulan' => 'required|numeric',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama_jabatan.required' => 'Jabatan tidak boleh kosong',
            'gaji_perbulan.required' => 'Gaji tidak boleh kosong',
            'gaji_perbulan.numeric' => 'Gaji harus angka',
        ];
    }
}
