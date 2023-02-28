<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSales extends Model
{
    use HasFactory;
    public $table = 'msales';
    public $timestamps = false;
    protected $fillable =['k_sales', 'asal', 'k_sales_old', 'n_sales', 'nik', 'kategori', 'tgl_input', 'user_input', 'tgl_update', 'user_update', 'non_aktif', 
                          'flag_grouphead', 'flag_kanit', 'kode_kanit', 'nik_kanit'];
}
