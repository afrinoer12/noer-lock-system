<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FingerprintUser extends Model
{
    protected $fillable = [
        'fingerprint_id',
        'name',
        'role',
        'status',
    ];
}