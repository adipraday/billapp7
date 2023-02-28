<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MJenisKoran extends Model
{
    use HasFactory;
    public $table = 'mjenis_koran';
    public $timestamps = false;
    protected $fillable =[
        'k_jenis',
        'n_jenis',
        'flag_aktif',
        'tgl_input',
        'waktu',
        'user_input',
        'user_update',
        'tgl_update'
    ];
}