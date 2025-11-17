<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pendapatan;

class TransaksiPendapatan extends Model
{
    use HasFactory;

    protected $table = 'transaksipendapatan';
    protected $primaryKey = 'IDTransaksi';
    public $timestamps = false;

    public function pendapatan()
    {
        return $this->belongsTo(Pendapatan::class, 'IDPendapatan');
    }
}