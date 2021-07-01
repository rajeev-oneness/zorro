<?php

namespace App\Http\Middleware;

use Closure;
use App\Admin;

class CheckDeliverySatus
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
        $status = Admin::pluck('delivery_status')->toArray();
        if ($status[0] == 1) {
            return $next($request);
        }
        return back();
    }
}
