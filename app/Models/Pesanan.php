<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanans';
    protected $primaryKey = "id_pesanans";
    
    protected $fillable = [
        'id_users_1','id_users_2','id_detail_pesanans'
    ];
}
