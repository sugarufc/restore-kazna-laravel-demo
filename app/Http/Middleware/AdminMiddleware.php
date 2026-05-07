<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::check() && Auth::user()->is_admin){

            $links = session()->has('links') ? session('links') : [];
            $currentLink = request()->path(); // Getting current URI like 'category/books/'
            array_unshift($links, $currentLink); // Putting it in the beginning of links array
            session(['links' => $links]); // Saving links array to the session

            return $next($request);
        }

        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        return redirect()->route('login');
    }
}
