<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewAsPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // TODO: Check If Requested id can be served to $authId; Need hierarchy level set
        $authId = Auth::id();
        if (session()->has('original-auth-id')) {
            $authId = session()->get('original-auth-id');
        }
        $user = User::find($authId);
        if (!$user->hasRole('Supervisor')) {
            abort(403, "Access denied");
        }
        return $next($request);
    }
}
