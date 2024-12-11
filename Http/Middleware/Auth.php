<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->session()->get('user');
        
        if (!isset($user['is_login']) || !$user['is_login']) {
            return redirect('/signin')->with('error', 'Anda harus login terlebih dahulu');
        }
        
        return $next($request);
    }
}