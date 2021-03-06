<?php

namespace App\Http\Middleware;

use Closure;

class VerifyInstall
{
    public function handle($request, Closure $next)
    {
        $web = app('App\Models\Webs\Web');

        if (! $web->installed && ! $request->is('api*')) {
            if (! isset($web->config['install_step'])) {
                return redirect()->route('install::index');
            } else {
                return redirect()->route('install::'.$web->config['install_step']);
            }
        }

        return $next($request);
    }
}
