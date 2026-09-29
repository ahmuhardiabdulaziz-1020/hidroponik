<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJenisPelangganRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'jenis_pelanggan' => [
                'required',
                'string',
                'max:50',
                'unique:jenis_pelanggans,jenis_pelanggan,'.$this->route('jenis_pelanggan')->id_jenpelanggan.',id_jenpelanggan',
            ],

        ];
    }
}
