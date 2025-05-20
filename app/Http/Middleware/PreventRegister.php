<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Setting;  // <-- import your Setting model

class PreventRegister
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Fetch the setting from database, assuming `key` and `value` columns or adjust accordingly
        $registrationAllowed = Setting::where('key', 'app_user_registration')->value('value');

        // If value stored as string, convert to boolean explicitly
        if (!$registrationAllowed || $registrationAllowed == '0' || $registrationAllowed === false) {
            return response()->json(['message' => __('Forbidden')], 403);
        }

        return $next($request);
    }
}
