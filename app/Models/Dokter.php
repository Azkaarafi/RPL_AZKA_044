<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $table = "dokter";
    protected $fillable = ['regis_id','nama_dokter', 'specialization'];

    public function regis()
    {
        return $this->belongsTo(boy::class, 'regis_id');
    }
}
