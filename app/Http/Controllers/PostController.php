<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Mail\MyMail;
use App\Models\Posts;
use Illuminate\Support\Facades\Mail;

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

   public function postContact(Request $request){
    $this->validate($request, [
        'name' => 'required|max:225',
        'email' => 'required|email',
        'adress' => 'required|max:225',
        'ask' => 'required|min:10'
    ]);

    $data = [
        'name' => 'John Doe',
        'message' => 'This is my message',
    ];

    $mail = new Mail();
    Mail::to('recipient@example.com')
        ->subject('My Subject')
        ->from('sender@example.com')
        ->send(new MyMail($data, $mail));

    return 'Email sent successfully!';

   }


}
