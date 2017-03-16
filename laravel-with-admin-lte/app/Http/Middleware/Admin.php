<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\Business\User;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!User::checkAdmin(Auth::user()->id)) {
            if (!User::checkMember(Auth::user()->id)) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response('Unauthorized.', 401);
                } else {
                    return redirect('/product_detail');
                }
            }
            return $next($request);
            // if ($request->ajax() || $request->wantsJson()) {
            //     return response('Unauthorized.', 401);
            // } else {
            //     return redirect()->guest('login');
            // }
        }
        return $next($request);
    }
}