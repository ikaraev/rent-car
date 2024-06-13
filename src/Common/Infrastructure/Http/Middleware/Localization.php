<?php

namespace Karaev\Common\Infrastructure\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use GeoIp2\Database\Reader;
use Karaev\Common\Domain\Api\Data\LocalizationInterface;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
            return $next($request);
        }

        try {
            $reader = new Reader(__DIR__ . '/../../mmdb/GeoLite2-Country.mmdb');
            $record = $reader->country($request->ip());

            $isoCode = strtolower($record->country->isoCode);

            if (in_array($isoCode, LocalizationInterface::CODE_ENUM)) {
                App::setLocale($isoCode);

                return $next($request);
            }

        } catch (\Exception $e) {
            Log::notice($e->getMessage());
        }

        App::setLocale(app()->getLocale());

        return $next($request);
    }
}
