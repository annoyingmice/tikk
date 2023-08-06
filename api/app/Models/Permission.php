<?php

namespace App\Models;

use App\Models\Traits\PermissionTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use PermissionTrait, HasFactory;

    protected $fillable = [
        'name',
        'owner'
    ];
}
