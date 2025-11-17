<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buyer;
use App\Models\Driver;

class Chat extends Model
{
    use HasFactory;

    protected $table = 'chat';
    protected $primaryKey = 'IDChat';
    public $timestamps = false; 

    public function sender()
    {
        return $this->belongsTo(Buyer::class, 'IDSender');
    }

    public function receiver()
    {
        return $this->belongsTo(Driver::class, 'IDReceiver');
    }
}