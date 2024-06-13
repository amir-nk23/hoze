<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MenuGroup;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function group(){

        $menugroups=MenuGroup::query()->select('id','name')->get();

        return response()->success('',compact('menugroups',));


    }

    public function item(){

        $items=MenuItem::query()->select('id','title','link','linkable_id','order','new_tab')->where('status',1)->get();

        return response()->success('',compact('items',));


    }
}
