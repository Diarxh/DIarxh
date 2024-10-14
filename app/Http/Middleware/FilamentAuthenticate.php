<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class FilamentAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('filament')->check()) {
            return $this->auth->shouldUse('filament');
        }

        $this->unauthenticated($request, ['filament']);
    }

    protected function redirectTo($request)
    {
        return route('filament.auth.login');
    }
}