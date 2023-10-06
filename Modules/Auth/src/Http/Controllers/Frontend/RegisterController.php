<?php

declare(strict_types=1);
namespace Modules\Auth\src\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    /**
     * Display page register
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('Auth::frontend.register');
    }


    /**
     * Handle new account registration logic
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => ['email','string','required','unique:users'],
            'password' => ['string','min:8','required','confirmed']
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        Auth::attempt($request->all());

        return redirect(route('home.index'));
    }
}
