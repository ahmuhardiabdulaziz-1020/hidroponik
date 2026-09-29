<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBatchTanamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'kode_batch' => [
                'required',
                'unique:batch_tanams,kode_batch'
            ],


            'id_varietas' => [
                'required',
                'exists:varietas,id_varietas'
            ],


            'tanggal_semai' => [
                'nullable',
                'date'
            ],


            'tanggal_tanam' => [
                'required',
                'date'
            ],


            'jumlah_tanam' => [
                'required',
                'integer',
                'min:1'
            ],


            'status' => [
                'required',
                'in:direncanakan,berjalan,selesai,gagal'
            ],


            'keterangan' => [
                'nullable'
            ],

        ];
    }
}