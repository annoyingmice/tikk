<?php

namespace App\Models;

use App\Models\Traits\ScheduleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory, ScheduleTrait;

    protected $fillable = [
        'name',
        'company_id',
        'ride_id',
        'start_date',
        'end_date',
    ];
}
