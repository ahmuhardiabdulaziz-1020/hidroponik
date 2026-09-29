<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Talang extends Model
{
    protected $table = 'talangs';

    protected $primaryKey = 'id_talang';


    protected $fillable = [
        'kode_talang',
        'tipe_talang',
        'fase_tanaman',
        'kapasitas',
        'keterangan',
    ];


    public function riwayatTanams()
    {
        return $this->hasMany(
            RiwayatTanam::class,
            'id_talang',
            'id_talang'
        );
    }

    public function monitoringTanamans()
    {
        return $this->hasMany(
            MonitoringTanaman::class,
            'id_talang',
            'id_talang'
        );
    }
}