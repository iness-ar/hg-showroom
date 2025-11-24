<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobils';

    protected $guarded = [];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }
}
