<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJasaMajalah extends Model
{
    use HasFactory;
    public $table = 'mjasa_majalah';
    public $timestamps = false;
    protected $fillable =[
        'k_jasa',
        'n_jasa',
        'beban',
        'tarif',
        'tgl_input',
        'waktu',
        'user_input',
        'flag_btl'
    ];
}
