<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guard extends Model
{
    use HasFactory;
    /**
     * @NOTE
     * -------------------------------------
     *  This model is only used in JWT Guard
     * -------------------------------------
     */
    protected $fillable = [
        'iss',
        'aud',
        'iat',
        'exp',
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'phone',
        'address',
    ];
}
