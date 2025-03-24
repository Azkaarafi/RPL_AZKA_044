<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekam_medis extends Model
{
    use HasFactory;

    protected $table = "rekam_medis";  
   
    protected $fillable = ['nama_pasien', 'Usia', 'Biaya_Pengobatan', 'image', 'tanggal_periksa', 'catatan'];
}
