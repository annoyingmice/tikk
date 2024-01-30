<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Libs\JsonWebToken;
use App\Models\Guard;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Auth::viaRequest(
            'jwt',
            fn (Request $request) => new Guard(
                JsonWebToken::serializeGuard(
                    JsonWebToken::credentials(
                        $request->bearerToken()
                    )
                )
            )
        );
    }
}
