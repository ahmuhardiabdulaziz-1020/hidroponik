<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Panen extends Model
{
    protected $table = 'panens';

    protected $primaryKey = 'id_panen';

    protected $fillable = [
        'id_batch',
        'tanggal_panen',
        'jumlah_tanaman',
        'berat_panen',
        'satuan_berat',
        'kualitas',
        'catatan',
    ];
    public function batchTanam()
    {
    return $this->belongsTo(BatchTanam::class, 'id_batch');
    }
    public function alokasiPenjualan()
    {
    return $this->hasMany(AlokasiPenjualan::class, 'id_panen');
    }
}