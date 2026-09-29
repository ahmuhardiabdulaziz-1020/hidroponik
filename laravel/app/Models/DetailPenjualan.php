<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $table = 'detail_penjualans';

    protected $primaryKey = 'id_detpenjualan';

    protected $fillable = [
        'id_sayur',
        'id_penjualan',
        'jumlah',
        'satuan',
        'harga_satuan',
        'subtotal',
        'keterangan',
    ];
    public function penjualan()
    {
    return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }
    public function sayur()
    {
    return $this->belongsTo(Sayur::class, 'id_sayur');
    }
    public function alokasiPenjualan()
    {
    return $this->hasMany(AlokasiPenjualan::class, 'id_detpenjualan');
    }
}