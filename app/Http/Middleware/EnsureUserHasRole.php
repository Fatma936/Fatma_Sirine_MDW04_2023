<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if($request->user()->role == $role) return $next($request);

<<<<<<< HEAD
        return redirect()->route('custom404');

=======
        return redirect()->route('custom403');
        
>>>>>>> 8e51aff37405569572a84a603c98d7e3e818cac5
    }
}
