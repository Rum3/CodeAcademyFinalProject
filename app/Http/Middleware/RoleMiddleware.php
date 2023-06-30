<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    protected $roles = [
        'student' => 'student',
        'teacher' => 'teacher',
        'employer' => 'employer',
        'admin' => 'admin',
    ];
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!auth()->check()) {
            return redirect('/')->with('message', 'Login to access the website info');
        }

        if (!isset($this->roles[$role]) || auth()->user()->role !== $role) {
            return redirect(to: '/')->with('error', 'You are not '.$role.'!');
        }

        return $next($request);
    }
}
