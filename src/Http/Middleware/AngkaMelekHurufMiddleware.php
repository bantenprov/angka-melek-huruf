<?php

namespace Bantenprov\AngkaMelekHuruf\Http\Middleware;

use Closure;

/**
 * The AngkaMelekHurufMiddleware class.
 *
 * @package Bantenprov\AngkaMelekHuruf
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class AngkaMelekHurufMiddleware
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
        return $next($request);
    }
}
