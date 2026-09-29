<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSayurRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $sayur = $this->route('sayur');

        return [
            'kode_sayur' => [
                'required',
                'string',
                'max:20',
                Rule::unique('sayurs', 'kode_sayur')
                    ->ignore($sayur->id_sayur, 'id_sayur'),
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