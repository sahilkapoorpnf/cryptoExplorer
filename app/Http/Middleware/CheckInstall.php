<?php

namespace App\Http\Middleware;

use Closure;

class CheckInstall
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $installed)
    {
        $installed = $installed === 'true';
        $file = storage_path('installed');

        if ($installed && !file_exists($file)) {
            return response()->redirectTo('/install.php');
        } elseif (!$installed && file_exists($file)) {
            return redirect()->route('front.index');
        }

        return $next($request);
    }
}
