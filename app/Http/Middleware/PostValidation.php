<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PostValidation
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
        $validate=$request->validate([
            'title'=>'required|regex:/^[a-zA-ZÑñ\s]+$/',
            'content'=>'required|regex:/^[a-zA-ZÑñ\s]+$/',
        ]);  
        return $next($request);
    }
}
