<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umrah extends Model
{
    protected $table = 'umrahs';
    protected $fillable = [
        'nama', 'slug', 'status', 'maskapai', 'thumbnail', 'banner', 'harga', 'hotel', 'itenary', 'harga_termasuk', 'harga_tidak', 'pendaftaran'
    ];
}
