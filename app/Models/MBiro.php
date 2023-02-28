<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MBiro extends Model
{
    use HasFactory;
    public $table = 'mbiro';
    public $timestamps = false;
    protected $fillable =[
        'k_biro',
        'n_biro',
        'alamat1',
        'alamat2',
        'alamat',
        'kota',
        'kode_pos',
        'phone',
        'fax',
        'person',
        'prefix',
        'email',
        'website',
        'n_pt',
        'alm1_pt',
        'alm2_pt',
        'alamat_pt',
        'kota_pt',
        'kode_pos_pt',
        'npwp',
        'jtempo',
        'diskon',
        'k_hold',
        'k_penata',
        'tgl_input',
        'user_input',
        'tgl_update',
        'user_update',
        'flag_bt1',
        'validasi',
        'ket_validasi',
        'user_validasi',
        'non_aktif',
        'flag_akte',
        'flag_ktp',
        'flag_npwp'
    ];
}
