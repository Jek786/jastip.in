<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Driver;

class Pengantaran extends Model
{
    use HasFactory;
    protected $table = 'pengantaran';
    protected $primaryKey = 'IDPengantaran';
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class, 'IDOrder');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'IDDriver');
    }
}