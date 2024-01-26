<?php

namespace App\Models\Traits;

use App\Models\Company;
use App\Models\Ride;

trait ScheduleTrait
{
    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }

    public function ride()
    {
        return $this->hasOne(Ride::class, 'id', 'ride_id');
    }
}
