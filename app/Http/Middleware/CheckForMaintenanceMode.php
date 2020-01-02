<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Closure;
use Symfony\Component\HttpFoundation\IpUtils;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [
        //
    ];

    public function handle($request, Closure $next)
    {
        if ($this->app->isDownForMaintenance()) {
            $data = json_decode(file_get_contents($this->app->storagePath().'/framework/down'), true);

            if (isset($data['allowed']) && IpUtils::checkIp($request->ip(), (array) $data['allowed'])) {
                return $next($request);
            }

            throw new MaintenanceModeException($data['time'], $data['retry'], $data['message']);
        }else{
            return $next($request);
        }
    }
}
