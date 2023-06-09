<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    { 
        // if (Auth::guard('admin')->user()) {
        //     return $next($request);
        // }

        // return redirect('/loginAdmin');

        if (Auth::guard('admin')->user()) {
            return redirect('/user')->with('success', 'You are not authorized to access this page.');
        }

      
        return $next($request);
    }
    }

