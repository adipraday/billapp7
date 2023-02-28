<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTarifMajalahMbm extends Model
{
    use HasFactory;
    public $table = 'mtarif_mbm';
    public $timestamps = false;
    protected $fillable =[
        'k_tarif',
        'n_tarif',
        'tarif',
        'ukuran',
        'tgl_input',
        'jam_input',
        'user_input',
        'tgl_update',
        'user_update',
        'flag_btl',
        'bw',
        'hal'
    ];
}
