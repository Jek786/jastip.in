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
        'firstName',
        'lastName',
        'emailAddress',
        'password',
        'profilePictureUrl'
    ];

    protected $hidden = [
        'password',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'IDBuyer', 'IDBuyer');
    }

    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'IDSender', 'IDBuyer');
    }

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'IDReceiver', 'IDBuyer');
    }

    // Helper untuk mendapatkan nama lengkap
    public function getFullNameAttribute()
    {
        return $this->firstName . ' ' . $this->lastName;
    }
}