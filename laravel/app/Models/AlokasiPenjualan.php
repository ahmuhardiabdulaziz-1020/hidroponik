<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlokasiPenjualan extends Model
{
    protected $table = 'alokasi_penjualans';

    protected $primaryKey = 'id_lokasi';


    protected $fillable = [
        'id_detpenjualan',
        'id_panen',
        'jumlah',
        'satuan',
        'keterangan',
    ];


    public function detailPenjualan()
    {
        return $this->belongsTo(
            DetailPenjualan::class,
            'id_detpenjualan',
            'id_detpenjualan'
        );
    }


    public function panen()
    {
        return $this->belongsTo(
            Panen::class,
            'id_panen',
            'id_panen'
        );
    }
}