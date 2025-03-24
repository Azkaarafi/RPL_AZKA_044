<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class boy extends Model
{
    use HasFactory;
    protected $table="regis";
    protected $fillable = ['username', 'password', 'role'];

}
