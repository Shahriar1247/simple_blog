<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\View\View;
use App\Models\Posts;

class BlogController extends Controller
{
    public function getSingle($slug){
        $posts = posts::where('slug', '=', $slug)->first();
        return view('blog.single')->with('posts', $posts);
    }
}
