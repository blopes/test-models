<?php

namespace Blopes\SharedModels\Middleware;

use Blopes\SharedModels\Models\User;
use Closure;
use Illuminate\Auth\Middleware\EnsureEmailIsVerified;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Blopes\SharedModels\Traits\ApiResponseTrait;

class CustomEmailVerification extends EnsureEmailIsVerified
{
    use ApiResponseTrait;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @param  string|null              $redirect_to_route
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse|null
     */
    public function handle($request, Closure $next, $redirect_to_route = null)
    {
        if (auth()->user()) {
            /**
             *  @var \Blopes\SharedModels\Models\User $user
             **/

            $user = auth()->user();

            if ($user instanceof MustVerifyEmail && !$user->hasVerifiedEmail()) {
                $request->user()->currentAccessToken()->delete();

                return $this->sendResponse(200, 'Email not verified. User logged out.');
            }
        } else {
            $user = User::where('email', '=', strtolower(trim($request->email)))->first();

            if (
                ($user instanceof MustVerifyEmail &&
                    !$user->hasVerifiedEmail())
            ) {
                return $request->expectsJson()
                    ? $this->sendResponse(403, 'Your email address is not verified.')
                    : Redirect::guest(URL::route($redirect_to_route ?: 'verification.notice'));
            }
        }



        return $next($request);
    }
}
