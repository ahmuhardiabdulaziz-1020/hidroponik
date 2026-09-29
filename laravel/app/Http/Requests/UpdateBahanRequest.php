<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBahanRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'kode_bahan' => [
                'required',
                'string',
                'max:20',
                'unique:bahans,kode_bahan,'.$this->route('bahan')->id_bahan.',id_bahan',
            ],


            'nama_bahan' => [
                'required',
                'string',
                'max:100',
            ],


            'jenis_bahan' => [
                'required',
                'in:benih,rockwool,nutrisi,disinfektan,lainnya',
            ],


            'satuan_bahan' => [
                'required',
                'string',
                'max:20',
            ],


            'stok' => [
                'required',
                'numeric',
                'min:0',
            ],


            'stok_minimum' => [
                'required',
                'numeric',
                'min:0',
            ],

        ];
    }
}