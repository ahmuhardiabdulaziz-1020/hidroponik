<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'id_jenpelanggan',
        'nama_pelanggan',
        'no_hp',
        'alamat',
    ];


    public function jenisPelanggan()
    {
        return $this->belongsTo(
            JenisPelanggan::class,
            'id_jenpelanggan',
            'id_jenpelanggan'
        );
    }


    public function penjualan()
    {
        return $this->hasMany(
            Penjualan::class,
            'id_pelanggan'
        );
    }
}