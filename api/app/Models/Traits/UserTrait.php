<?php

namespace App\Models\Traits;

use App\Models\Otp;
use App\Models\Role;

trait UserTrait
{
    public function otps()
    {
        return $this->hasMany(Otp::class);
    }

    public function activeOtp()
    {
        return $this->otps()->whereNull('revoke_at')->orderBy('created_at', 'desc')->first();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
