<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;
    protected $table = "perawat";
    protected $fillable = ['regis_id', 'nama_perawat','department'];

    public function regis()
    {
        return $this->belongsTo(boy::class, 'regis_id');
    }
}
