<?php
declare(strict_types=1);
namespace Modules\Auth\src\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    /**
     * Display page admin login
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('Auth::adminhtml.login');
    }

    /**
     * Handle login logic
     *
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse|Redirector
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email'=>$request['email'], 'password' => $request['password']])){
            return redirect(route('admin.index'));
        }

        $status = 404;
        return view('Auth::adminhtml.login',compact('status',));
    }

    /**
     * Handle Log out logic
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('admin.logout'));
    }
}
