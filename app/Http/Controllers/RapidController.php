<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;




class RapidController extends Controller
{

    //public function __construct(){

        //$this->middleware('auth');
    //}
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
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->with('categories', $categories)->with('tags', $tags);
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
            'category_id' => 'required|integer',
            //'tag_id' => 'required|integer',
            'body' => 'required'
        ));
        //dd($request->all());
        //$validate = $request->validate([
            //'title' => 'required|max:225',
            //'body'=> 'required']);

        // storing
        $posts = new posts;
        $posts->title = $request->title;
        $posts->slug = $request->slug;
        $posts->category_id = $request->category_id;

        $posts->body = $request->body;

        //saving image

        if ($request->featured_image) {
            $imageName= time().'.'.$request->featured_image->extension();
            $request->featured_image->move(public_path('images'), $imageName);
            $posts->image= "images/".$imageName;
        }

        $posts->save();

        $posts->tags()->sync($request->tags, false);

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
        $categories = Category::all();
        $cats=[];
        foreach ($categories as $Category) {
            $cats[$Category->id] = $Category->name;
        }

        $tags = Tag::all();
        $tag2=array();
        foreach($tags as $tag){
            $tag2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->with('posts', $posts)->with('categories', $cats)->with('tags', $tags);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all());
        // validate
        $this->validate($request, array(
            'title' => 'required|max:225',
            'slug' => 'required|alpha_dash|min:5|max:255',
            'category_id' => 'required|integer',
            'body' => 'required',
            'featured_image' => 'image'
        ));

        //$validate = $request->validate([
            //'title' => 'required|max:225',
            //'body'=> 'required']);

        // storing
        $posts = posts::find($id);
        $posts->title = $request->input('title');
        $posts->slug =$request->input('slug');
        $posts->category_id =$request->input('category_id');
        $posts->body = $request->input('body');

        if ($request->featured_image) {
            $imageName= time().'.'.$request->featured_image->extension();
            $request->featured_image->move(public_path('images'), $imageName);
            $posts->image= "images/".$imageName;
        }

        if ($request->tags) {
            $posts->tags()->sync($request->tags);
        }
        else {
            $posts->tags()->sync(array());
        }


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
        $posts->tags()->detach();

        $posts->delete();


        return redirect()->route('posts.index');
    }
}

