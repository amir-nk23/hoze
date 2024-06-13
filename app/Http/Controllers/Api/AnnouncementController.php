<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function index(){

        $announcements = Announcement::query()->select('id','title','summary','image','published_at')->where('status',1)->paginate(5);

        return response()->success('',compact('announcements',));


    }


    public function show(Announcement $announcement){

        $announcement->select('id','title','summary','image','published_at');

        return response()->success('',compact('announcement',));

    }
}
