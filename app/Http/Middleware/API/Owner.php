<?php

namespace App\Http\Middleware\API;

use App\Http\Controllers\API\Traits\ApiResponseTrait;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Owner
{
    use ApiResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response

    {
       return  $next($request) ;
        return  \auth()->user()->hasRole('owner') ? $next($request) : $this->ApiResponse(null, __('You are not authorized to access this route'), 401);
    }
}
