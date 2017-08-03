<?php

namespace App\Http\Middleware;

use App\Entity\EmployeeEntity;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $auth = Auth::user();

        if (Auth::user()->role != EmployeeEntity::MANAGER) {
            return redirect('/api/home');
        }

        return $next($request);
    }
}
