<?php

declare(strict_types=1);
namespace Modules\Auth\src\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    /**
     * Display page register
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('Auth::frontend.register');
    }


    /**
     * Handle new account registration logic
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
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
