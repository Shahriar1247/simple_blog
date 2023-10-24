<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Posts;

class PostController extends Controller
{
   public function home(){
    $postss = posts::orderBy('created_at', 'desc')->get();
    return view('sites.home',compact('postss'));
   }

   public function about(){
    return view('sites.about');
   }

   public function contact(){
    return view('sites.contact');
   }
}
