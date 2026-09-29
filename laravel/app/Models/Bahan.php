<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $table = 'bahans';

    protected $primaryKey = 'id_bahan';

    protected $fillable = [
        'kode_bahan',
        'nama_bahan',
        'jenis_bahan',
        'satuan_bahan',
        'stok',
        'stok_minimum',
    ];
    public function mutasi()
    {
    return $this->hasMany(Mutasi::class, 'id_bahan');
    }
}