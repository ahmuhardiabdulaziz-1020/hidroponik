<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatTanam extends Model
{
    protected $table = 'riwayat_tanams';

    protected $primaryKey = 'id_riwtanam';


    protected $fillable = [
        'id_batch',
        'id_talang',
        'tanggal',
        'kegiatan',
        'jumlah_tanaman',
        'kondisi',
        'keterangan',
    ];


    public function batch(): BelongsTo
    {
        return $this->belongsTo(
            BatchTanam::class,
            'id_batch',
            'id_batch'
        );
    }


    public function talang(): BelongsTo
    {
        return $this->belongsTo(
            Talang::class,
            'id_talang',
            'id_talang'
        );
    }
}