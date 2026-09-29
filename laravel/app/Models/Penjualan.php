<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualans';

    protected $primaryKey = 'id_penjualan';

    protected $fillable = [
        'kode_penjualan',
        'id_pelanggan',
        'tanggal_penjualan',
        'total',
        'status',
        'keterangan',
    ];
    public function pelanggan()
    {
    return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
    public function detailPenjualan()
    {
    return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
    }
}