<?php

namespace App\Models;

use App\Models\Traits\SeatLogTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatLog extends Model
{
    use HasFactory, SeatLogTrait;

    protected $fillable = [
        'seat_id',
        'ticket_id',
        'seat_log_type_id',
        'check_in_url',
        'meta_data'
    ];
}
