<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'pembayarans';
    protected $primaryKey = "id_pembayarans";

    protected $fillable = [
        'id_pesanans', 'waktu_bayar', 'total_bayar', 'status'
    ];
}
