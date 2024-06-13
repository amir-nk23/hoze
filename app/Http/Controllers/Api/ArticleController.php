<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(){

        $articles = Article::query()->select('id','title','subtitle','summary','image',)->where('status',1)->paginate(5);

        return response()->success('',compact('articles',));

    }

    public function show(Article $article){

        $article->select('id','title','subtitle','summary','resource','body','image',);

        return response()->success('',compact('article',));

    }
}
