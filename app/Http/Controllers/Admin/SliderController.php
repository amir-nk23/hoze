<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderStoreRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'حذف اسلایدر!';
        $text = "ایا اطمینان دارید ؟";
        confirmDelete($title, $text);
        $sliders = Slider::query()->get();

        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderStoreRequest $request)
    {



        $name =   Storage::disk('public')->put('/slider',$request->image);

        $news = Slider::create([
                'title'=>$request->title,
                'summary'=>$request->summary,
                'image'=>$name,
                'status'=>$request->status,
                'link'=>$request->link
            ]
        );


        return redirect()->route('admin.slider.index');

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
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $slider=Slider::find($id);

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


            $slider = Slider::find($id);
            $slider->update([
                'title' => $request->title,
                'summary' => $request->summary,
                'status' => $request->status,
            ]);
        }

        return redirect()->route('admin.slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::find($id);
        Storage::disk('public')->delete($slider->image);
        $slider->delete();


        return redirect()->route('admin.slider.index');
    }
}
