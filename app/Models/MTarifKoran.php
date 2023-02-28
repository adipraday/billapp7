<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MTarifKoran extends Model
{
    use HasFactory;
    public $table = 'mtarif_koran';
    public $timestamps = false;
    protected $fillable =[
        'k_tarif',
        'n_tarif',
        'tarif',
        'ukuran',
        'warna',
        'flag_btl',
        'tgl_input',
        'user_input',
        'tgl_update',
        'user_update'
    ];
}