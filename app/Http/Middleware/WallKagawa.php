<?php

namespace App\Http\Middleware;

use Closure;

class WallKagawa
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
        // 埋め込みパーツは例外
        if($request->is('blogparts/*')){
            return $next($request);
        }

        // 香川検知
        if(session('pref') === 'kagawa' || $request->get('pref') === 'kagawa'){
            session(['pref' => 'kagawa']);
            return $next($request);
        }

        return $next($request);
    }
}
