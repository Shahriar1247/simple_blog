<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $posts_id)
    {
        //validate
        $this->validate($request, array(
            'name' => 'required|max:225',
            'email' => 'required|email',
            'comment' => 'required|min:1'
        ));

        //storing
        $posts = posts::find($posts_id);

        $comment = new comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->confirmed = true;
        $comment->posts()->associate($posts);

        $comment->save();

        //redirecting
        //return redirect()->route('blog.single', [$posts->slug]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = comment::find($id);
        return view('comments.edit')->with('comment', $comment);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        $comment = comment::find($id);
        $this->validate($request, array('comment' => 'required'));

        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->route('posts.show', $comment->posts->id);

    }

    public function delete($id)
    {
        $comment =comment::find($id);
        return view('comments.delete',)->with('comment', $comment);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = comment::find($id);
        $posts_id = $comment->posts->id;
        $comment->delete();

        return redirect()->route('posts.show', $posts_id);
    }
}
