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

    protected $fillable = [
        'sender_name',
        'receiver_name',
        'IDSender',
        'IDReceiver',
        'message',
        'sent_at',
        'is_read'
    ];

    protected $casts = [
        'sent_at' => 'datetime',
        'is_read' => 'boolean'
    ];

    public function sender()
    {
        return $this->belongsTo(Buyer::class, 'IDSender', 'IDBuyer');
    }

    public function receiver()
    {
        return $this->belongsTo(Driver::class, 'IDReceiver', 'IDDriver');
    }
}