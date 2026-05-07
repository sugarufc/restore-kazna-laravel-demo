<?php

namespace App\Http\Middleware;

use Closure;

class BlockDemoWrites
{
    public function handle($request, Closure $next)
    {
        $safeMethods = ['GET', 'HEAD', 'OPTIONS'];

        if (config('app.demo_mode') && ! config('app.demo_allow_writes') && ! in_array($request->method(), $safeMethods, true)) {
            return redirect()
                ->back()
                ->with('warning', 'Демо-режим: изменения доступны для просмотра, но не сохраняются.');
        }

        return $next($request);
    }
}
