<?php
declare(strict_types=1);

namespace Modules\Home\src\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home::adminhtml.index');
    }
}
