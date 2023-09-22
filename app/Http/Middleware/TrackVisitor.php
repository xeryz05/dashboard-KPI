<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admin\Visitor;
use Illuminate\Support\Str;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $userAgent = $request->header('User-Agent');
        $ipAddress = $request->ip();

        if (!Visitor::isDuplicateVisitor($userAgent, $ipAddress)) {
            $visitor = new Visitor();
            $visitor->ip_address = $ipAddress;
            $visitor->user_agent = $userAgent;
            $visitor->visited_at = now();
            $visitor->unique_token = Str::random(32); // Buat token unik
            $visitor->save();
        }

        return $next($request);
    }
}
