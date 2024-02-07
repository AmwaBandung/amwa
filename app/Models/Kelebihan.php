<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelebihan extends Model
{
    protected $table = 'kelebihans';
    protected $fillable = [
        'kelebihan','deskripsi_kelebihan','icon'
    ];
}
