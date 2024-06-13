<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuItemStoreRequest;
use App\Models\Category;
use App\Models\MenuGroup;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function menugroup()
    {

        $menuGroups = MenuGroup::query()->get();


        return view('admin.menuitem.group',compact('menuGroups'));
    }

    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuItemStoreRequest $request)
    {



        MenuItem::create($request->only('title','linkable_type','linkable_id','link','menu_group_id','new_tab','status'));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menus = MenuItem::query()->where('menu_group_id',$id)->orderBy('order','asc')->with(['linkable'])->get();
        $menugroup=$id  ;
//
        $category = MenuItem::models;
        $items = Category::query()->get();
        $title = 'حذف منو!';
        $text = "ایا اطمینان دارید ؟";
        confirmDelete($title, $text);
        return view('admin.menuitem.index',compact('menus','category','items','menugroup'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $menu = MenuItem::find($id);
      $menu->update([
          'linkable_type'=>$request->linkable_type,
          'linkable_id'=>$request->linkable_id,
          'title'=>$request->title,
          'link'=>$request->link,
          'new_tab'=>$request->new_tab,
          'status'=>$request->status

      ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $menu = MenuItem::find($id);
       $menu->delete();
        return redirect()->back();
    }


    public function reorder(Request $request){

         MenuItem::setNewOrder($request->menu);

    }
}
