<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $x = 1;
        $categories = Category::orderBy('id', 'DESC')->paginate(20);
        return view('back.pages.category', compact('categories', 'x'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.pages.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->create($request->all());
        // try {
        //     $category->create($request->all());
        // } catch (Exception $exception) {
        //     switch ($exception->getCode()) {
        //         case 23000:
        //             $msg = "نام مستعار وارد شده تکراری است";
        //             break;
        //     }
        //     return redirect(route('admin.categories.create'))->with('warning', $msg);
        // }

        $msg = "ذخیره ی دسته بندی جدید با موفقیت انجام شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('back.pages.update_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        $msg = "ذخیره ی دسته بندی جدید با موفقیت انجام شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        $msg = "حذف با موفقیت انجام شد";
        return redirect(route('admin.categories'))->with('success', $msg);
    }
}
