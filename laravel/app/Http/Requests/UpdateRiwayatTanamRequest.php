<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRiwayatTanamRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [

            'id_batch' => [
                'required',
                'exists:batch_tanams,id_batch'
            ],


            'id_talang' => [
                'required',
                'exists:talangs,id_talang'
            ],


            'tanggal' => [
                'required',
                'date'
            ],


            'kegiatan' => [
                'required',
                'string',
                'max:100'
            ],


            'jumlah_tanaman' => [
                'required',
                'integer',
                'min:1'
            ],


            'kondisi' => [
                'required',
                'string',
                'max:100'
            ],


            'keterangan' => [
                'nullable'
            ],

        ];
    }
}