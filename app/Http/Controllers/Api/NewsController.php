<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function index(){


        $categoryId= \request('category_id');
        $search= \request('search');
        $tagId=\request('tag_id');

        $news = News::query()->select('id','featured','title','subtitle','summary','image',)
            ->where('status',1)
            ->whereDate('published_at','<=',now())
            ->with('categories')
            ->when($categoryId>0 ,function (Builder $query) use ($categoryId){

                return $query->where('category_id',$categoryId);
            })
            ->when($search ,function (Builder $query) use ($search){

                return $query->when('title','like',"%{$search}%");

            })
            ->when($tagId ,function (Builder $query) use ($tagId){

                return $query->with(['tags' => function (Builder $query) use ($tagId) {
                    $query->where('id', $tagId);
                }]);

            })
            ->paginate(5);

        return response()->success('',compact('news',));

    }

    public function show(News $news){


        $news->select('id','title','subtitle','body','image')->get();
        return response()->success('',compact('news',));

    }

}
