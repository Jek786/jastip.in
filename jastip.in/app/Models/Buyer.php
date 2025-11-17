<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Chat;

class Buyer extends Model
{
    use HasFactory;
    protected $table = 'buyer';
    protected $primaryKey = 'IDBuyer';
    public $timestamps = false;
    public function orders()
    {
        return $this->hasMany(Order::class, 'IDBuyer');
    }
    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'IDSender');
    }
}