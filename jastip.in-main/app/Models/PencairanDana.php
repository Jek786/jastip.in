<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Driver;

class PencairanDana extends Model
{
    use HasFactory;
    protected $table = 'pencairandana';
    protected $primaryKey = 'IDPencairan';
    public $timestamps = false;

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'IDDriver');
    }
}