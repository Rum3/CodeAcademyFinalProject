<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EmployerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()){
            if(Auth::user()->role == 'employer') {
                return $next($request);
            }else {
                return redirect('/')->with('error', 'You are not an employer!');
            }

        }else {

            return redirect('/')->with('message', 'Login to access the website info');
        }

        return $next($request);
        }
    }

