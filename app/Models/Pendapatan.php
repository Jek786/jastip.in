<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;
use App\Models\TransaksiPendapatan;

class Pendapatan extends Model
{
    use HasFactory;

    protected $table = 'pendapatan';
    protected $primaryKey = 'IDPendapatan';
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'IDDriver');
    }

    public function transaksiPendapatan()
    {
        return $this->hasMany(TransaksiPendapatan::class, 'IDPendapatan');
    }
}