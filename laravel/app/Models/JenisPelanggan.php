<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisPelanggan extends Model
{
    protected $table = 'jenis_pelanggans';

    protected $primaryKey = 'id_jenpelanggan';

    protected $fillable = [
        'jenis_pelanggan',
    ];


    public function hargaSayur()
    {
        return $this->hasMany(
            HargaSayur::class,
            'id_jenpelanggan',
            'id_jenpelanggan'
        );
    }


    public function pelanggan()
    {
        return $this->hasMany(
            Pelanggan::class,
            'id_jenpelanggan',
            'id_jenpelanggan'
        );
    }
}