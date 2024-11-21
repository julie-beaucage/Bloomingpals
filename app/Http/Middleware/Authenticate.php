<?php

namespace App\Http\Middleware;

use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return redirect()->route('home')->with('error', 'Votre session a expiré. Veuillez vous reconnecter.');
        }
    }

    public function handle($request, \Closure $next, ...$guards)
    {
        if (auth()->guest()) {
            return redirect()->route('home')->with('error', 'Vous n\'avez pas les droits pour accéder à cette page. Veuillez vous connecter.');
        }

        return $next($request);
    }
    
}
