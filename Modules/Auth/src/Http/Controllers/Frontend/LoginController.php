<?php
declare(strict_types=1);

namespace Modules\Auth\src\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller{

    /**
     * Display page login
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('Auth::frontend.login');
    }

    /**
     * Handle login logic
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function login(Request $request)
    {
        if (Auth::attempt(['email'=>$request['email'], 'password' => $request['password']])){
            return redirect(route('home.index'));
        }

        $status = 404;
        return view('Auth::frontend.login',compact('status',));
    }

    /**
     * Handle Log out logic
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect(route('home.index'));
    }
}
