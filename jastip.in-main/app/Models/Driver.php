<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Chat;
use App\Models\Pengantaran;
use App\Models\Pendapatan;
use App\Models\PencairanDana;

class Driver extends Model
{
    use HasFactory;

    // --- KONFIGURASI ---
    protected $table = 'driver';
    protected $primaryKey = 'IDDriver';
    public $timestamps = false;
    public function orders()
    {
        return $this->hasMany(Order::class, 'IDDriver');
    }
    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'IDReceiver');
    }
    public function pengantaran()
    {
        return $this->hasMany(Pengantaran::class, 'IDDriver');
    }
    public function pendapatan()
    {
        return $this->hasMany(Pendapatan::class, 'IDDriver');
    }
    public function pencairanDana()
    {
        return $this->hasMany(PencairanDana::class, 'IDDriver');
    }
}