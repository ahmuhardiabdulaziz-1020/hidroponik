<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVarietasRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'id_sayur' => 'required',
            'nama_varietas' => 'required|max:100',
            'est_bobot' => 'required|numeric',
            'satuan_bobot' => 'required|max:20',
        ];
    }
}
