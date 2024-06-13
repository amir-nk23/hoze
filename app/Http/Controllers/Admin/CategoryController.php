<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::query()->get();


        $title = 'حذف دسته!';
        $text = "ایا اطمینان دارید ؟";
        confirmDelete($title, $text);

        return view('admin.category.index',compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {

        Category::create([
            'title'=>$request->title,
            'type'=>$request->type,
            'status'=>$request->status,
        ]);

        toastr()->success('دسته بندی جدید ثبت شد');

        return redirect()->route('admin.category.index');

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
    public function edit(string $id): Renderable
    {

            $category = Category::find($id);


        return view('admin.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {


        $category = Category::find($id);

        $category->update([

            'title'=>$request->title,
            'type'=>$request->type,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $category=Category::find($id);
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
