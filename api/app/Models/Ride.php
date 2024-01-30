<?php

namespace App\Models;

use App\Models\Traits\RideTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use RideTrait, HasFactory;

    protected $fillable = [
        'name',
        'company_id',
        'ride_type_id',
        'meta_data'
    ];
}
