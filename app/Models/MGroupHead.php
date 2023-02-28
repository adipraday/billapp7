<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MGroupHead extends Model
{
    use HasFactory;
    public $table = 'mgrouphead';
    public $timestamps = false;
    protected $fillable =['k_grup_old', 'k_grup', 'desk_grup', 'n_gruphead', 'tgl_input', 'user_input', 'tgl_update', 'user_update', 'flag_batal', 'tgl_batal', 'user_batal', 'non_aktif'];
}
