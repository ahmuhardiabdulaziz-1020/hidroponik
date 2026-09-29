<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluarans';

    protected $primaryKey = 'id_pengeluaran';

    protected $fillable = [
        'tanggal',
        'kategori',
        'keterangan',
        'nominal',
        'metode_pembayaran',
        'referensi',
    ];
}