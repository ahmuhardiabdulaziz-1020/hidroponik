<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSayurRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'kode_sayur' => [
                'required',
                'string',
                'max:20',
                'unique:sayurs,kode_sayur',
            ],

            'nama_sayur' => [
                'required',
                'string',
                'max:100',
            ],

            'durasi_semai' => [
                'required',
                'integer',
                'min:0',
            ],

            'durasi_remaja' => [
                'required',
                'integer',
                'min:0',
            ],

            'durasi_panen' => [
                'required',
                'integer',
                'min:0',
            ],
        ];
    }
}