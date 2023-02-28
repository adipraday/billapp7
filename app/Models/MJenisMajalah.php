<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJenisMajalah extends Model
{
    use HasFactory;
    public $table = 'mjenis_majalah';
    public $timestamps = false;
    protected $fillable =[
        'k_jenis',
        'n_jenis',
        'tgl_input',
        'waktu',
        'user_input',
        'flag_btl'
    ];
}