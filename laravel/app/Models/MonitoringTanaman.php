<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonitoringTanaman extends Model
{
    protected $table = 'monitoring_tanamen';

    protected $primaryKey = 'id_monitoring';


    protected $fillable = [
        'id_batch',
        'id_talang',
        'tanggal_monitoring',

        'jumlah_hidup',
        'jumlah_mati',

        'tinggi_tanaman',
        'jumlah_daun',

        'ph_air',
        'ec_air',
        'suhu_air',

        'kondisi',
        'catatan',
        'foto',
    ];


    public function batch()
    {
        return $this->belongsTo(
            BatchTanam::class,
            'id_batch',
            'id_batch'
        );
    }


    public function talang()
    {
        return $this->belongsTo(
            Talang::class,
            'id_talang',
            'id_talang'
        );
    }
}