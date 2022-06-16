<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    protected $table = 'detail_pesanans';
    protected $primaryKey = "id_detail_pesanans";

    protected $fillable = [
        'lingkar_dada','lingkar_pinggung','lingkar_pinggang','panjang_baju','panjang_lengan','panjang_celana','keterangan','gambar'
    ];
}
