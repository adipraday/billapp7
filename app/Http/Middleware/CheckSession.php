<?php

namespace App\Http\Middleware;

use Closure;


class CheckSession
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
      if (empty(!session()->get('nik'))) {
        return $next($request);
      }

      return redirect('/y');
    }
}
