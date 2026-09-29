<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sayur extends Model
{
    protected $table = 'sayurs';

    protected $primaryKey = 'id_sayur';


    protected $fillable = [
        'kode_sayur',
        'nama_sayur',
        'durasi_semai',
        'durasi_remaja',
        'durasi_panen',
    ];


    public function varietas()
    {
        return $this->hasMany(
            Varietas::class,
            'id_sayur',
            'id_sayur'
        );
    }


    public function detailPenjualan()
    {
        return $this->hasMany(
            DetailPenjualan::class,
            'id_sayur',
            'id_sayur'
        );
    }


    public function hargaSayur()
    {
        return $this->hasMany(
            HargaSayur::class,
            'id_sayur',
            'id_sayur'
        );
    }
}