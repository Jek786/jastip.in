<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'orderdetail';
    protected $primaryKey = 'IDOrderDetail';
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class, 'IDOrder');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'IDProduct');
    }
}