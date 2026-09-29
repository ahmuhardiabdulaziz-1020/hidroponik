<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePelangganRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'id_jenpelanggan' => [
                'required',
                'exists:jenis_pelanggans,id_jenpelanggan',
            ],


            'nama_pelanggan' => [
                'required',
                'string',
                'max:100',
            ],


            'no_hp' => [
                'nullable',
                'string',
                'max:20',
            ],


            'alamat' => [
                'nullable',
                'string',
            ],

        ];
    }
}