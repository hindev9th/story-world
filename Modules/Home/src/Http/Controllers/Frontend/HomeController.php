<?php
declare(strict_types=1);

namespace Modules\Home\src\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class HomeController extends Controller{
    public function index()
    {
        $tags = Tag::all();
        return view('Home::frontend.index',compact('tags'));
    }
}
