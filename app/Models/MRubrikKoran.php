<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MRubrikKoran extends Model
{
    use HasFactory;
    public $table = 'mrubrik_koran';
    public $timestamps = false;
    protected $fillable =[
        'k_rubrik',
        'n_rubrik',
        'flag_btl',
        'tgl_input',
        'user_input',
        'user_update',
        'tgl_update'
    ];
}