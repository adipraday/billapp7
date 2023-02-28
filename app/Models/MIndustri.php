<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MIndustri extends Model
{
    use HasFactory;
    public $table = 'mindustri';
    public $timestamps = false;
    protected $fillable =['k_indus', 'n_indus', 'grp_iklan', 'tgl_input', 'waktu', 'user_input', 'grp_iklan2', 'non_aktif', 'user_update', 'tgl_update'];
}
