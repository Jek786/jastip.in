<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Restoran;
use App\Models\OrderDetail;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'IDProduct';
    public $timestamps = false;

    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'IDRestoran');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'IDProduct');
    }
}