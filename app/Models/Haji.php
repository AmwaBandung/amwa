<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Haji extends Model
{
    protected $table = 'hajis';
    protected $fillable = [
        'nama','slug','thumbnail','banner','dp','hotel','itenary','harga_termasuk','harga_tidak','pendaftaran'
    ];
}
