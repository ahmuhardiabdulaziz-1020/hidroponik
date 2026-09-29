<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaSayur extends Model
{
    protected $table = 'harga_sayurs';

    protected $primaryKey = 'id_harga';

    protected $fillable = [
        'id_sayur',
        'id_jenpelanggan',
        'harga',
        'satuan',
        'tanggal_mulai',
        'tanggal_akhir',
    ];
    public function sayur()
    {
    return $this->belongsTo(Sayur::class, 'id_sayur');
    }   
    public function jenisPelanggan()
    {
    return $this->belongsTo(JenisPelanggan::class, 'id_jenpelanggan');
    }
}