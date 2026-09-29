<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Varietas extends Model
{
    protected $table = 'varietas';

    protected $primaryKey = 'id_varietas';

    protected $fillable = [
        'id_sayur',
        'nama_varietas',
        'est_bobot',
        'satuan_bobot',
    ];
    public function sayur()
    {
        return $this->belongsTo(Sayur::class, 'id_sayur');
    }
    public function batchTanam()
    {
    return $this->hasMany(BatchTanam::class, 'id_varietas');
    }
}
