<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\CompanyTrait;

class Company extends Model
{
    use HasFactory, CompanyTrait;

    protected $fillable = [
        // @TODO
        // @FRONTEND
        // Format: Upload photo
        'avatar',
        // @TODO
        // @FRONTEND
        // Format: Upload photo
        'cover',
        'name',
        'email',
        // @TODO
        // @FRONTEND
        // Format: 000-0000
        'tel',
        // @TODO
        // @FRONTEND
        // Format: (+00)-000-000-0000 / 000-0000
        'phone',
        // @TODO
        // @FRONTEND
        // country, region, state/province, city/municipality, Str. Name, House No./ Building No.
        'address'
    ];
}
