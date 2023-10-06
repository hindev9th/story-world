<?php
declare(strict_types=1);
namespace Modules\Auth\src\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
class LoginController extends Controller{

    public function index()
    {
        return view("Auth::adminhtml.login");
    }
}
