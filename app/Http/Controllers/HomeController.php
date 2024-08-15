<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class HomeController extends Controller
{
    public function home()
    {
        $listCategory = Category::all();
        return view('index', compact('listCategory'));
    }

    public function categories()
    {
        return view('categories');
    }
}
