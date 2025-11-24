<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'tb_merk';

    protected $fillable = ['nama_merk'];

    public function mobils()
    {
        return $this->hasMany(Mobil::class, 'id_merk');
    }
}
