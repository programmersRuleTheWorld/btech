<?php

namespace App\Http\Middleware;

use Closure;
use App\Mail\TwoFactorAuthMail;
use Ramsey\Uuid\Uuid;

class TwoFactorAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = auth()->user();

        if($user->two_factor_expiry > \Carbon\Carbon::now()) {
            return $next($request);
        }

        $user->two_factor_token = Uuid::uuid4();
        $user->save();

        \Mail::to($user)->send(new TwoFactorAuthMail($user->two_factor_token));

        return redirect('/2fa');
    }
}
