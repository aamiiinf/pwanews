<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x = 1;
        $posts = Post::get();
        return view('back.pages.posts', compact('posts', 'x'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('title', 'id');
        return view('back.pages.created_post', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $post = new Post();
        $post = $post->create($request->all());
        $post->categories()->attach($request->categories);
        $post->tags()->attach($request->tags);

        $msg = "ذخیره ی مطلب جدید با موفقیت انجام شد";
        return redirect(route('admin.posts'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all()->pluck('name', 'id');
        $tags = Tag::all()->pluck('title', 'id');
        return view('back.pages.update_post', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);
        
        $msg = "ذخیره ی مطلب جدید با موفقیت انجام شد";
        return redirect(route('admin.posts'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $msg = "آیتم مورد نظر حذف گردید";
        return redirect(route('admin.posts'))->with('success', $msg);
    }

    public function updatestatus(Post $post)
    {
        if ($post->status == 1) {
            $post->status = 0;
        } else {
            $post->status = 1;
        }

        $post->save();
        $msg = "بروزرسانی با موفقیت انجام شد";
        return redirect(route('admin.posts'))->with('success', $msg);
    }
}
