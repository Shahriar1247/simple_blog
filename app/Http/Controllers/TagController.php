<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('tags.index')->with('tags', $tags);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, array(
            'name' => 'required|min:5|max:255'
        ));

        //storing
        $Tag = new Tag;
        $Tag->name = $request->name;
        $Tag->save();

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tags =Tag::find($id);
        return view('tags.show')->with('Tag', $tags);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Tag =Tag::find($id);
        return view('tags.edit')->with('Tag', $Tag);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Tag =Tag::find($id);
        $this->validate($request, array(
            'name' => 'required|min:5|max:255'
        ));

        $Tag->name = $request->name;

        $Tag->save();

        return redirect()->route('tags.show', $Tag->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Tag =Tag::find($id);
        $Tag->posts()->detach();

        $Tag->delete();

        return redirect()->route('tags.index');
    }
}
