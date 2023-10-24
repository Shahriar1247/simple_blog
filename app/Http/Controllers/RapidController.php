<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Posts;

class RapidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPost = posts::orderBy('id', 'desc')->Paginate(5);
        return view('posts.index')->with('allPost', $allPost);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, array(
            'title' => 'required|max:225',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'body' => 'required'
        ));

        //$validate = $request->validate([
            //'title' => 'required|max:225',
            //'body'=> 'required']);

        // storing
        $posts = new posts;
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->body = $request->body;

        $posts->save();

        //redirecting

        return redirect()->route('posts.show', $posts->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $posts = posts::find($id);
        return view('posts.show')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posts = posts::find($id);
        return view('posts.edit')->with('posts', $posts);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validate
        $this->validate($request, array(
            'title' => 'required|max:225',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'body' => 'required'
        ));

        //$validate = $request->validate([
            //'title' => 'required|max:225',
            //'body'=> 'required']);

        // storing
        $posts = posts::find($id);
        $posts->title = $request->input('title');
        $posts->slug =$request->input('slug');
        $posts->body = $request->input('body');

        $posts->save();

        //redirecting

        return redirect()->route('posts.show', $posts->id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $posts = posts::find($id);

        $posts->delete();

        return redirect()->route('posts.index');
    }
}
