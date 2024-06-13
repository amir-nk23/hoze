<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementStoreRequest;
use App\Http\Requests\AnnouncementUpdateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Announcement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'حذف اطلاعیه!';
        $text = "ایا اطمینان دارید ؟";
        confirmDelete($title, $text);
        $announcements = Announcement::query()->get();

        return view('admin.announcement.index',compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnnouncementStoreRequest $request)
    {
        $name =   Storage::disk('public')->put('/announcement',$request->image);
        if (!empty($request->input('published_at'))){

            $news = Announcement::create([
                    'title'=>$request->title,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'published_at'=>$request->published_date,
                    'views_count'=>0,
                    'user_id'=>Auth::id(),
                    'image'=>$name,
                    'status'=>$request->status
                ]
            );
        }else{


            $news = Announcement::create([
                    'title'=>$request->title,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'published_at'=>now(),
                    'views_count'=>0,
                    'user_id'=>Auth::id(),
                    'image'=>$name,
                    'status'=>$request->status,
                ]
            );


        }

        return redirect()->route('admin.announcement.index');
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
        $annoncement=Announcement::find($id);
        return view('admin.announcement.edit',compact('annoncement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnouncementUpdateRequest $request, string $id)
    {
        $announcement=Announcement::find($id);

        if ($request->hasFile('image')){

            Storage::disk('public')->delete($announcement->image);

            $name =   Storage::disk('public')->put('/announcement',$request->image);

            if (!empty($request->published_date)){

                $announcement->update([
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'published_at'=>$request->published_date,
                    'user_id'=>Auth::id(),
                    'image'=>$name,
                    'status'=>$request->status



                ]);
            }else{


                $announcement->update([
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'published_at'=>$request->published_at,
                    'user_id'=>Auth::id(),
                    'image'=>$name,
                    'status'=>$request->status
                    ]);

            }


        }else{



            if (!empty($request->published_date)){

                $announcement->update([
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'published_at'=>$request->published_date,
                    'user_id'=>Auth::id(),
                    'status'=>$request->status
                ]);


            }else{

                $announcement->update([
                    'title'=>$request->title,
                    'subtitle'=>$request->subtitle,
                    'summary'=>$request->summary,
                    'body'=>$request->body,
                    'published_at'=>$request->published_at,
                    'user_id'=>Auth::id(),
                    'status'=>$request->status
                ]);

            }




        }
        return redirect()->route('admin.announcement.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news=Announcement::find($id);
        Storage::disk('public')->delete($news->image);
        $news->delete();


        return redirect()->route('admin.announcement.index');
    }
}
