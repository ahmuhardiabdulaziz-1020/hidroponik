<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchTanam extends Model
{
    protected $table = 'batch_tanams';

    protected $primaryKey = 'id_batch';


    protected $fillable = [
        'kode_batch',
        'id_varietas',
        'tanggal_semai',
        'tanggal_tanam',
        'jumlah_tanam',
        'status',
        'keterangan',
    ];


    public function varietas()
    {
        return $this->belongsTo(
            Varietas::class,
            'id_varietas',
            'id_varietas'
        );
    }


    public function riwayatTanams()
    {
        return $this->hasMany(
            RiwayatTanam::class,
            'id_batch',
            'id_batch'
        );
    }

    public function monitoringTanamans()
    {
        return $this->hasMany(
            MonitoringTanaman::class,
            'id_batch',
            'id_batch'
        );
    }


    public function panens()
{
    return $this->hasMany(
        Panen::class,
        'id_batch',
        'id_batch'
    );
}


public function getStatusTanamanAttribute()
{
    $riwayatTerakhir = $this->riwayatTanams()
        ->with('talang')
        ->latest('tanggal')
        ->latest('id_riwtanam')
        ->first();


    if (!$riwayatTerakhir) {
        return 'Belum Dimulai';
    }


    return $riwayatTerakhir->talang->fase_tanaman ?? '-';
}

}