<?php

namespace App\Models;

use App\Models\Traits\SeatTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory, SeatTrait;

    protected $fillable = [
        'label',
        'ride_id',
        'meta_data',
    ];
}
