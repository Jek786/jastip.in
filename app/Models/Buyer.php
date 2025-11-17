<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Order;
use App\Models\Chat;

class Buyer extends Authenticatable
{
    use Notifiable;

    protected $table = 'buyer';
    protected $primaryKey = 'IDBuyer';
    public $timestamps = false;

    protected $fillable = [
        'email', 
        'password', 
        'name' // sesuaikan field yang ada
    ];

    protected $hidden = [
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'IDBuyer');
    }

    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'IDSender');
    }
}
