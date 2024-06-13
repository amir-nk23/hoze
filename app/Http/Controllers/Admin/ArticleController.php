<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleStoreRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $articles = Article::query()->get();


        $title = 'حذف مقاله!';
        $text = "ایا اطمینان دارید ؟";
        confirmDelete($title, $text);

        return view('admin.article.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::query()->where('type','=','article')->where('status',1)->get();

        return view('admin.article.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleStoreRequest $request)
    {
        $name =   Storage::disk('public')->put('/article',$request->image);

            $news = Article::create([
                    'title'=>$request->title,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'views_count'=>0,
                    'user_id'=>Auth::id(),
                    'category_id'=>$request->category_id,
                    'image'=>$name,
                    'status'=>$request->status
                ]
            );


        return redirect()->route('admin.article.index');
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
        $article=Article::find($id);
        $categories=Category::query()->where('type','=','news')->get();

        return view('admin.article.edit',compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleUpdateRequest $request, string $id)
    {
        $article=Article::find($id);
        if ($request->hasFile('image')){


            Storage::disk('public')->delete($article->image);

            $name =   Storage::disk('public')->put('/article',$request->image);

            $article->update([
                'title'=>$request->title,
                'summary'=>$request->summary,
                'body'=>$request->body,
                'views_count'=>0,
                'user_id'=>Auth::id(),
                'category_id'=>$request->category_id,
                'image'=>$name,
                'status'=>$request->status


            ]);
        }else{


            $article->update([
                'title'=>$request->title,
                'summary'=>$request->summary,
                'body'=>$request->body,
                'published_at'=>$request->published_date,
                'views_count'=>0,
                'user_id'=>Auth::id(),
                'category_id'=>$request->category_id,
                'status'=>$request->status
            ]);



        }
        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article=Article::find($id);
        Storage::disk('public')->delete($article->image);
        $article->delete();


        return redirect()->route('admin.article.index');
    }
}
