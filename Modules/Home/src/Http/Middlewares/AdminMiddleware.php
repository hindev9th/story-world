<?php
declare(strict_types=1);
namespace Modules\Home\src\Http\Middlewares;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware{

    /**
     * check user is admin
     *
     * @param Request $request
     * @param Closure $next
     * @return Application|RedirectResponse|Redirector|mixed
     */
    public function handle(Request $request,Closure $next)
    {
        if (Auth::check() && Auth::user()->permission === 0){
            return $next($request);
        }

        return redirect(route('admin.login'));
    }
}
