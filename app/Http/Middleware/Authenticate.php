<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        // if (! $request->expectsJson()) {
        //     return route('login');
        // // }
        // if (!Auth::guard('client')->check()) {
        //     return route('index');
        // }
        // dd($request->expectsJson());
        // $guard = array_get($exception->guards(), 0);
        // switch ($guard) {
        //     case "admin":
        //         $login = "admin-login";
        //         break;
        //     default:
        //         $login = "login";
        //         break;
        // }
        // if (!Auth::guard('web')->check()) {
        //     return route('login.admin.index');
        // }
        // if (!Auth::guard('client')->check()) {
        //     return route('login.index');
        // }
    }
}
