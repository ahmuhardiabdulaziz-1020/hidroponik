<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    protected $table = 'mutasis';

    protected $primaryKey = 'id_mutasi';

    protected $fillable = [
        'id_bahan',
        'tanggal',
        'jenis_mutasi',
        'jumlah',
        'stok_sebelum',
        'stok_sesudah',
        'referensi',
    ];
    public function bahan()
    {
    return $this->belongsTo(Bahan::class, 'id_bahan');
    }
}