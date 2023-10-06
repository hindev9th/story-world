<?php
declare(strict_types=1);
namespace Modules\Auth\src\Http\Middlewares;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminLoginedMiddleware{
    public function handle(Request $request, \Closure $next)
    {
        if (Auth::check() && Auth::user()->permission === 0){
            return redirect(route('admin.index'));
        }
        return $next($request);
    }
}
