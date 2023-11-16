<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect(route('login'));
        }

        $userRole = auth()->user()->role;

        
        if (in_array($userRole, ['company', 'supplier']) || ($userRole == 'regular' && !$this->isRestrictedRoute($request))) {
            return $next($request);
        }

        return redirect(route('home'))->with('error', 'Unauthorized access');
    }

    protected function isRestrictedRoute(Request $request): bool
    {
        
        $restrictedRoutes = [
            'farmschedule',
            'coffeeinventory',
        ];

        
        return in_array($request->route()->getName(), $restrictedRoutes);
    }
}
