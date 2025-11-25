<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JastipSetting extends Model
{
    protected $table = 'jastip_settings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'jam_buka',
        'jam_tutup',
        'slot',
        'biaya',
        'status'
    ];

    public $timestamps = false; // kalau tidak butuh created_at & updated_at
}
