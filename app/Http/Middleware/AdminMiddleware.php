<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
         // Periksa apakah pengguna terautentikasi
         if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Periksa apakah pengguna memiliki peran admin
        if (auth()->user()->role !== 'admin') {
            // Jika tidak, alihkan pengguna ke halaman yang sesuai
            return redirect()->route('home')->with('error', 'You are not authorized to access this page.');
        }
        return $next($request);
    }
}
