<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Dflydev\DotAccessData\Data;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'حذف خبر!';
        $text = "ایا اطمینان دارید ؟";
        confirmDelete($title, $text);
        $news=News::query()->get();
        $news->load([
            'users',
            'categories'

        ]);
        $users=User::query()->get();

        return view('admin.news.index',compact('news','users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::query()->where('type','=','news')->where('status',1)->get();
        $tags = Tag::query()->get();
        return view('admin.news.create',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsStoreRequest $request)
    {

        $featured=0;

        if ($request->featured){

            $featured=$request->featured;
        }

     $name =   Storage::disk('public')->put('/image',$request->image);


        if (!empty($request->input('published_at'))){

            $news = News::create([
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'published_at'=>$request->published_date,
                    'views_count'=>0,
                    'user_id'=>Auth::id(),
                    'category_id'=>$request->category_id,
                    'image'=>$name,
                    'status'=>$request->status,
                    'featured'=>$featured
                ]
            );
        }else{


            $news = News::create([
                    'featured'=>$featured,
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'published_at'=>now(),
                    'views_count'=>0,
                    'user_id'=>Auth::id(),
                    'category_id'=>$request->category_id,
                    'image'=>$name,
                    'status'=>$request->status
                ]
            );


        }

        $tags =$request->input('tag');
        $tagsIds = $news->attachTags($tags);
        $news->tags()->attach($tagsIds);
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news=News::find($id);
        $news->load([
            'tags'

        ]);
        $categories=Category::query()->where('type','=','news')->get();
        $tags=Tag::query()->get();


      return view('admin.news.edit',compact('news','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       $news=News::find($id);
       if ($request->hasFile('image')){


           Storage::disk('public')->delete($news->image);

           $name =   Storage::disk('public')->put('/image',$request->image);

           $news->update([
               'title'=>$request->title,
               'subtitle'=>$request->subtitle,
               'summary'=>$request->summary,
               'body'=>$request->body,
               'published_at'=>$request->published_date,
               'views_count'=>0,
               'user_id'=>Auth::id(),
               'category_id'=>$request->category_id,
               'image'=>$name,
               'status'=>$request->status,
               'featured'=>$request->featured


           ]);
       }else{


           $news->update([
               'title'=>$request->title,
               'subtitle'=>$request->subtitle,
               'summary'=>$request->summary,
               'body'=>$request->body,
               'published_at'=>$request->published_date,
               'views_count'=>0,
               'user_id'=>Auth::id(),
               'category_id'=>$request->category_id,
               'status'=>$request->status,
               'featured'=>$request->featured
           ]);



       }
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news=News::find($id);
        Storage::disk('public')->delete($news->image);
        $news->tags()->detach();
        $news->delete();


        return redirect()->route('admin.news.index');
    }

    public function search(Request $request){

        $user=$request->user_id;
        $title = $request->title;
        $s_date =$request->s_date;
        $e_date=$request->e_date;
        $status = $request->status;


       $news=News::query()

            ->when($user=='all',function ($qurey) use($user)
            {
                return $qurey;
            })
           ->when($user!='all',function ($query) use ($user)
           {
               $query->where('user_id',$user);

           })
           ->when($title,function ($query) use ($title)
           {
               $query->where('title','like','%'.$title.'%');

           })
           ->when($s_date,function ($query) use ($s_date)
           {
               $query->where('created_at','>=',$s_date);
           })
           ->when($e_date,function ($query) use ($e_date)
           {
               $query->where('created_at','<=',$e_date);
           })
           ->when($status=='all',function ($query) use ($status)
           {
              return $query;
           })
           ->when($status!='all',function ($query) use ($status)
           {
              return  $query->where('status',$status);
           })->get();


        $title = 'حذف خبر!';
        $text = "ایا اطمینان دارید ؟";
        confirmDelete($title, $text);
        $news->load([
            'users',
            'categories'

        ]);
        $users=User::query()->get();

        return view('admin.news.index',compact('news','users'));

    }
}
