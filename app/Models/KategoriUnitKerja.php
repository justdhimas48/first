<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUnitKerja extends Model
{
    protected $table = 'tbl_kategori_unit_kerja';
    protected $fillable = [ 
        "id",
        "nama",
        "is_actived",
    ]; 
}
