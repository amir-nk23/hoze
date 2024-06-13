<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {

        $links = Link::query()->select('id', 'link', 'title', 'summary', 'image',)->where('status', 1)->paginate(5);

        return response()->success('', compact('links',));


    }
}
