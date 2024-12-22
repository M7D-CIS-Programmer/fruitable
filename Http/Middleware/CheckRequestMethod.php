<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRequestMethod
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // تحقق من أن الطلب هو POST
        if ($request->isMethod('post')) {
            return $next($request);
        }

        // إذا لم يكن POST، أعد استجابة 405
        return response()->json(['message' => 'Method Not Allowed'], 405);
    }
}
