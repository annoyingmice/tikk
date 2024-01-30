<?php

namespace App\Models;

use App\Models\Traits\RideTypeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RideType extends Model
{
    use HasFactory, RideTypeTrait;

    protected $fillable = [
        'name'
    ];
}
