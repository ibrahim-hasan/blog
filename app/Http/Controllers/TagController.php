<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\ArabicString;
use App\Tag;
use App\Post;
use Session;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tags = Tag::orderBy('id')->paginate(10);
        $posts = Post::all();
        return view('manage.tags.index')->withTags($tags)->withPosts($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => ['required', new ArabicString, 'max:255']
        ]);

        $tag = new Tag;

        $tag->name = $request->name;

        $tag->save();

        Session::flash('success', 'تم إضافة الوسم بنجاح!');

        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $tag = Tag::find($id);

        return view('manage.tags.show')->withTag($tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tag = Tag::find($id);

        return view('manage.tags.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tag = Tag::find($id);

        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $tag->name = $request->name;

        $tag->save();

        Session::flash('success', 'تم تعديل اسم الوسم بنجاح');

        return redirect()->route('tags.show', $tag->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $tag = Tag::find($id);
        $tag->posts()->detach();

        $tag->delete();

        Session::flash('success', 'تم حذف الوسم بنجاح!');

        return redirect()->route('tags.index');
    }
}
