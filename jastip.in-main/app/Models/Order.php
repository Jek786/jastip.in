<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer;
use App\Models\Restoran;
use App\Models\Driver;
use App\Models\OrderDetail;
use App\Models\Payment;
use App\Models\Pengantaran;
use App\Models\Chat;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $primaryKey = 'IDOrder';
    public $timestamps = false;

    protected $fillable = [
        'IDBuyer',
        'IDRestoran',
        'IDDriver',
        'Total'
    ];

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'IDBuyer', 'IDBuyer');
    }

    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'IDRestoran', 'IDRestoran');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'IDDriver', 'IDDriver');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'IDOrder', 'IDOrder');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'IDOrder', 'IDOrder');
    }

    public function pengantaran()
    {
        return $this->hasOne(Pengantaran::class, 'IDOrder', 'IDOrder');
    }

    // Relasi ke chat melalui buyer
    public function chats()
    {
        return $this->hasMany(Chat::class, 'IDReceiver', 'IDBuyer');
    }
}