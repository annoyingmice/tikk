<?php

namespace App\Models;

use App\Models\Traits\OtpTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otp extends Model
{
    use HasFactory, OtpTrait;

    protected $fillable = [
        'user_id',
        'host',
        'otp',
        'used_at',
        'revoke_at',
    ];
}
