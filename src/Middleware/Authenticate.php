<?php

namespace Blopes\SharedModels\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Determine if the user is logged in to any of the given guards.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  array                    $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    public function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }
        $cookie = $request->header('Cookie');

        if (!is_null($cookie)) {
            $cookie_vars = explode(';', $cookie);

            // Looks for the token value inside the cookie
            foreach ($cookie_vars as $var) {
                if (strpos($var, env('COOKIE_NAME', 'token') . '=') !== false) {
                    $token = explode('=', $var)[1];
                    $token = 'Bearer ' . urldecode($token);
                    break;
                }
            }

            // Sets Authorization Header for Sanctum validation
            if (isset($token)) {
                $request->headers->set('Authorization', $token);
            }
        }

        //dd($request->header("Authorization"));
        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                return $this->auth->shouldUse($guard);
            }
        }

        $this->unauthenticated($request, $guards);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : "route('login')";
    }
}
