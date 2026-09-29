<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(
        Request $request,
        Closure $next,
        $role
    ): Response {

        if (!auth()->check()) {
            abort(401);
        }


        if (auth()->user()->userRole->kode_role !== $role) {
            abort(403);
        }


        return $next($request);
    }
}