<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MEdisi extends Model
{
    use HasFactory;
    public $table = 'medisi_mbm';
    public $timestamps = false;
    protected $fillable =[
        'k_edisi',
        'n_edisi',
        'tgl_terbit',
        'flag_btl',
        'tgl_input',
        'jam_input',
        'user_input',
        'tgl_update',
        'jam_update',
        'user_update'
    ];
}