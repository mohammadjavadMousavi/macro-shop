<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Permission;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$parametr)
    {


        $permission = Permission::query()->where('title',$parametr)->firstOrFail();

        if (! auth()->user()->role->hasPermission($permission)) {
            abort(403);
        }

        return $next($request);
    }
}
