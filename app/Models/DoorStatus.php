<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoorStatus extends Model
{
    protected $fillable = [
        'status',
        'mode',
        'last_updated_at',
    ];

    protected $casts = [
        'last_updated_at' => 'datetime',
    ];
}