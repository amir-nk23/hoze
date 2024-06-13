<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $links = Link::query()->get();
        return view('admin.link.index',compact('links'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.link.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name =   Storage::disk('public')->put('/link',$request->image);

        $news = Link::create([
                'title'=>$request->title,
                'summary'=>$request->summary,
                'image'=>$name,
                'link'=>$request->link,
                'status'=>$request->status
            ]
        );


        return redirect()->route('admin.link.index');
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

        $link=Link::find($id);

        return view('admin.link.edit',compact('link'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $slider=Link::find($id);

        if ($request->hasFile('image')){


            Storage::disk('public')->delete($slider->image);

            $name =   Storage::disk('public')->put('/article',$request->image);

            $slider->update([
                'title'=>$request->title,
                'summary'=>$request->summary,
                'image'=> $name,
                'status'=>$request->status,
            ]);

        }else {


            $slider = Link::find($id);
            $slider->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'status' => $request->status,
            ]);
        }

        return redirect()->route('admin.link.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
