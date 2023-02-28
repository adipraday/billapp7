<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MProduk extends Model
{
    use HasFactory;
    public $table = 'sproduk';
    public $timestamps = false;
    protected $fillable =['k_produk', 'k_sproduk', 'asal', 'k_produk_old', 'k_sproduk_old', 'n_sproduk', 'flag_btl', 'tgl_input', 'user_input', 'tgl_update', 'user_update'];
}