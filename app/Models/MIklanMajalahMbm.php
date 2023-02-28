<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MIklanMajalahMbm extends Model
{
    use HasFactory;
    public $table = 'iklan_mbm';
    public $timestamps = false;
    protected $fillable =[
        'no_kwt',
        'k_order',   
        'no_kontrak',
        'k_biro',
        'k_klien',   
        'atasnama',  
        'j_atasnama',
        'k_indus',   
        'judul',      
        'k_edisi',    
        'tgl_terbit',
        'k_jenis',    
        'k_tarif',   
        'hrg_tarif', 
        'k_jasa',     
        'hrg_jasa',  
        'jml_eks',    
        'nharga',     
        'discp_in',  
        'discr_in',   
        'neto',       
        'discp_out', 
        'discr_out', 
        'ppnp',       
        'ppnr',       
        'ttagih',
        'tgl_jt',
        'type',
        'sts_barter',     
        'tgl_input', 
        'user_input',
        'catatan',   
        'cara_bayar',
        'k_produk',  
        'k_sproduk', 
        'k_sales',   
        'k_grup'    
    ];
}

// 'no_kwt', 'nik', 'k_order', 'no_kontrak', 'k_biro', 'k_klien', 'atasnama', 'j_atasnama', 'k_sales_old', 'k_produk_old', 'k_sproduk_old', 'k_indus, judul', 
//         'k_edisi', 'tgl_terbit', 'k_jenis', 'k_tarif', 'hrg_tarif', 'k_jasa', 'hrg_jasa', 'jml_eks', 'nharga', 'discp_in', 'discr_in', 'neto', 'discp_out', 'discr_out',	
//         'ppnp', 'ppnr', 'ttagih', 'tgl_jt', 'flag_muat', 'flag_btl', 'type', 'sts_barter', 'noseri', 'tgl_pajak', 'trs_pajak', 'sts_pajak', 'jam_input', 'tgl_input', 
//         'user_input', 'catatan', 'jam_update', 'tgl_update', 'user_update', 'cara_bayar', 'validasi', 'stat_validasi', 'ket_validasi', 'user_validasi', 'tgl_validasi',	
//         'jam_validasi', 'flag_paket_lama', 'ket_paket, petugas', 'k_produk', 'k_sproduk', 'k_sales', 'flag_revisi', 'no_kwt_asal', 'ket_revisi', 'k_grup_old', 'k_grup',	
//         'tagihan_bermasalah', 'keterangan_bermasalah'
