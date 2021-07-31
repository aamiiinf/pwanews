<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x = 1;
        $tags = Tag::get();
        return view('back.pages.tags', compact('tags','x'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.created_tag');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag();
        $tag = $tag->create($request->all());

        $msg = "ذخیره ی مطلب جدید با موفقیت انجام شد";
        return redirect(route('admin.tags'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $tags = Tag::all();
        return view('back.pages.update_tag', compact('tag', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->name = $request->name;
        $tag->tag = $request->tag;
        $tag->save();
        $msg = "ذخیره ی دسته بندی جدید با موفقیت انجام شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        $msg = "آیتم مورد نظر حذف گردید";
        return redirect(route('admin.tags'))->with('success', $msg);
    }

    public function updatec_status_tag(Tag $tag)
    {
        if ($tag->status == 1) {
            $tag->status = 0;
        } else {
            $tag->status = 1;
        }

        $tag->save();
        $msg = "بروزرسانی با موفقیت انجام شد";
        return redirect(route('admin.tags'))->with('success', $msg);
    }
}
