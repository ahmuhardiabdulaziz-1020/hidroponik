<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTalangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'kode_talang' => [
                'required',
                'string',
                'max:20',
                'unique:talangs,kode_talang',
            ],


            'tipe_talang' => [
                'required',
                'string',
                'max:100',
            ],


            'fase_tanaman' => [
                'nullable',
                'string',
                'max:100',
            ],


            'kapasitas' => [
                'required',
                'integer',
                'min:0',
            ],


            'keterangan' => [
                'nullable',
                'string',
            ],

        ];
    }
}
