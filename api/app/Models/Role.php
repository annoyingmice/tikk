<?php

namespace App\Models;

use App\Models\Traits\RoleTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use RoleTrait, HasFactory;

    protected $fillable = [
        'name',
        'owner'
    ];
}
