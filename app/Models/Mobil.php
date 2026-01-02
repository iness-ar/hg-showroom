<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mobil extends Model
{
    use HasFactory, SoftDeletes; 

    protected $table = 'tb_mobil';
    protected $guarded = [];

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }

    // Audit trail
    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater() {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
