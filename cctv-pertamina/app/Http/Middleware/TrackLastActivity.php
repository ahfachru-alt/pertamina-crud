<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TrackLastActivity
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            optional(auth()->user())->forceFill(['last_activity_at' => now()])->save();
        }
        return $next($request);
    }
}

