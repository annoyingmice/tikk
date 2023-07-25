<?php

namespace App\Models\Traits;

use App\Models\Otp;

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
}
