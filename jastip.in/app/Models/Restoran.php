<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class Restoran extends Model
{
    use HasFactory;
    protected $table = 'restoran';
    protected $primaryKey = 'IDRestoran';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'IDRestoran');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'IDRestoran');
    }
}