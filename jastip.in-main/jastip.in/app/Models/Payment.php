<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment';
    protected $primaryKey = 'IDPayment';
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class, 'IDOrder');
    }
}