<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $fillable = [
        'fingerprint_id',
        'name',
        'access_status',
        'description',
        'access_time',
    ];

    protected $casts = [
        'access_time' => 'datetime',
    ];
}