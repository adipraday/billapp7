<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MMediaOrder extends Model
{
    use HasFactory;
    public $table = 'media_order';
    public $primaryKey = 'k_order';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable =[
        'k_order',     
        'no_kontrak',  
        'k_biro',      
        'k_klien',     
        'nilai',       
        'status_ppn',  
        'nilai_ppn',     
        'nilai_real',     
        'nilai_nonbarter',  
        'nilai_barter',  
        'jenis_kontrak',  
        'jbarter',  
        'k_sales',  
        'k_produk',  
        'k_sproduk',  
        'judul',   
        'materi',  
        'k_indus',  
        'atasnama',  
        'j_atasnama',  
        'jtempo',  
        'flag_paket',  
        'flag_btl',  
        'flag_protect',  
        'user_input',  
        'tgl_input',            
        'tgl_update',           
        'user_update',  
        'flag_pktnoseri',  
        'flag_openprotect',  
        'tgl_openprotect',  
        'no_kwt_paket',  
        'tgl_inv_paket',  
        'tgl_pajak_paket',  
        'jmedia_paket',  
        'nsub_paket',                      
        'kode_pt_paket',  
        'noseri_paket',      
        'trs_pajak',  
        'sts_pajak',  
        'tgl_jt_paket',  
        'ket_update',                          
        'k_grup_old',  
        'k_grup' 
    ];
}
