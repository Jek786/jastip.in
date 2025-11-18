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

class Order extends Model
{
    use HasFactory;

    // --- KONFIGURASI ---
    protected $table = 'order';
    protected $primaryKey = 'IDOrder';
    public $timestamps = false;

    public function buyer()
    {
        return $this->belongsTo(Buyer::class, 'IDBuyer');
    }


    public function restoran()
    {
        return $this->belongsTo(Restoran::class, 'IDRestoran');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'IDDriver');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'IDOrder');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'IDOrder');
    }

    public function pengantaran()
    {
        return $this->hasOne(Pengantaran::class, 'IDOrder');
    }
}